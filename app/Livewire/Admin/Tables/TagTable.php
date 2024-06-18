<?php

namespace App\Livewire\Admin\Tables;

use App\Models\Tag;
use App\Traits\{FilterTrait, ModalTrait};
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

use Livewire\{Component, WithPagination};
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TagTable extends Component
{
    use WithPagination, ModalTrait, FilterTrait;

    public $name = [];
    public $slug = [];
    public $rowId;
    public $columns;
    public $perPages;

    public function updatedName($value, $locale)
    {
        $this->slug[$locale] = Str::slug($value);
    }

    public function create()
    {
        $this->validate([
            'name.*' => 'required|string|min:3|max:25|unique:tag_translations,name,',
            'slug.*' => 'required|string|unique:tag_translations,slug',
        ]);

        try {
            $tag = Tag::create();
            foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                $tag->translateOrNew($localeCode)->name = $this->name[$localeCode];
                $tag->translateOrNew($localeCode)->slug = $this->slug[$localeCode];
            }

            $tag->save();
            session()->flash('success', trans('The tag has been created successfully'));
            $this->closeModal('createModal');
        } catch (Exception $e) {
            Log::error('[createTag]: ' . $e->getMessage());
            session()->flash('error', trans('Failed to create tag'));
        }
    }

    public function render()
    {
        $this->columns = ['id', 'name', 'slug', 'posts_count'];
        $headers = ['Id', 'Name', 'Slug', 'Posts', 'Actions'];

        $rows = Tag::withCount('posts')
            ->when($this->searchBy === 'posts_count', function ($query) {
                $query->having('posts_count', 'like', "%{$this->search}%");
            }, function ($query) {
                $query->where($this->searchBy, 'like', "%{$this->search}%");
            })
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);

        $this->perPages = [5, 10, 20, 50];

        return view('admin.pages.tables.tag-table', [
            'locales' => LaravelLocalization::getSupportedLocales(),
            'headers' => $headers,
            'rows' => $rows,
        ])->extends('layouts.dashboard')->section('content');
    }
}
