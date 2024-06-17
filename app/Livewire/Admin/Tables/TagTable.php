<?php

namespace App\Livewire\Admin\Tables;

use App\Models\Tag;
use App\Traits\{FilterTrait, ModalTrait};
use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\{Component, WithPagination};

class TagTable extends Component
{
    use WithPagination, ModalTrait, FilterTrait;

    public $rowId;
    public $name;
    public $slug;
    public $columns;
    public $perPages;

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
        $topTagUsed = Tag::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->first();
        $inTrashed = Tag::onlyTrashed()->count();

        return view('admin.pages.tables.tag-table', compact('headers', 'rows', 'topTagUsed', 'inTrashed'))
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function create()
    {
        $validated =   $this->validate([
            'name' => 'required|string|min:3|max:25|unique:tags,name,',
            'slug' => 'required|string|unique:tags,slug,',
        ]);

        try {
            Tag::create($validated);
            session()->flash('success', trans('The tag has been created successfully'));
            $this->resetField();
            $this->closeModal('createModal');
        } catch (Exception $e) {
            Log::error('[createTag]: ' . $e->getMessage());
            session()->flash('error', trans('Failed to create tag'));
        }
    }
}
