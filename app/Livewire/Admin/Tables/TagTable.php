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

    public $name;
    public $slug;
    public $rowId;
    public $columns;
    public $perPages;

    public function updatedName()
    {
        $this->slug = str()->slug($this->name);
    }

    public function create()
    {
        $validated =   $this->validate([
            'name' => 'required|string|min:3|max:25|unique:tags,name,',
            'slug' => 'required|string|unique:tags,slug,',
        ]);

        try {
            Tag::create($validated);
            session()->flash('success', trans('alerts.Tag created'));
            $this->resetField();
            $this->closeModal('createModal');
        } catch (Exception $e) {
            Log::error('[createTag]: ' . $e->getMessage());
            session()->flash('error', trans('Failed to create tag'));
        }
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        $this->rowId = $tag->id;
        $this->name = $tag->name;
        $this->slug = $tag->slug;
    }

    public function update($id)
    {
        $tag = Tag::findOrFail($id);
        $validated =   $this->validate([
            'name' => 'required|string|min:3|max:25|unique:tags,name,' . $tag->id,
            'slug' => 'required|string|unique:tags,slug,' . $tag->id,
        ]);

        try {
            $tag->update($validated);
            session()->flash('success', trans('The tag has been updated successfully'));
            $this->closeModal('editModal');
        } catch (Exception $e) {
            Log::error('[updateTag]: ' . $e->getMessage());
            session()->flash('error', trans('Failed to update tag'));
        }
    }

    public function delete($id)
    {
        $tag = Tag::findOrFail($id);
        try {
            if ($tag) {
                $tag->delete();
                session()->flash('success', trans('The tag has been deleted successfully'));
                $this->closeModal('deleteModal');
            } else {
                session()->flash('error', trans('Tag not found'));
            }
        } catch (Exception $e) {
            Log::error('[deleteTag]: ' . $e->getMessage());
            session()->flash('error', trans('Failed to delete tag'));
        }
    }

    public function resetField()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'searchBy', 'perPage', 'orderBy', 'orderDir']);
        $this->dispatch('urlReset', route('admin.tags'));
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
            'headers' => $headers,
            'rows' => $rows,
        ])->extends('layouts.dashboard')->section('content');
    }
}
