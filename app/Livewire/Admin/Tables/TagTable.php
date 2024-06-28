<?php

namespace App\Livewire\Admin\Tables;

use App\Models\Tag;
use App\Traits\{FilterTrait, ModalTrait};
use Livewire\{Component, WithPagination};
use Illuminate\Support\Facades\Log;
use Exception;

class TagTable extends Component
{
    use WithPagination, ModalTrait, FilterTrait;

    public $rowId;
    public $name;
    public $slug;

    public function updatedName()
    {
        $this->slug = $this->makeSlug($this->name);
    }

    public function create()
    {
        $validated =   $this->validate([
            'name' => 'required|string|max:25|unique:tags,name,',
            'slug' => 'required|string|unique:tags,slug,',
        ]);

        try {
            Tag::create($validated);
            session()->flash('success', trans('alerts.tag.Created'));
            $this->resetFields();
            $this->closeModal('createModal');
        } catch (Exception $e) {
            Log::error('[createTag]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.tag.Failed create'));
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
            'name' => 'required|string|max:25|unique:tags,name,' . $tag->id,
            'slug' => 'required|string|unique:tags,slug,' . $tag->id,
        ]);

        try {
            $tag->update($validated);
            session()->flash('success', trans('alerts.tag.Updated'));
            $this->resetFields();
            $this->closeModal('editModal');
        } catch (Exception $e) {
            Log::error('[updateTag]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.tag.Failed update'));
        }
    }

    public function delete($id)
    {
        $tag = Tag::findOrFail($id);
        try {
            if ($tag) {
                $tag->delete();
                session()->flash('success', trans('alerts.tag.Deleted'));
                $this->closeModal('deleteModal');
            } else {
                session()->flash('error', trans('alerts.tag.Not found'));
            }
        } catch (Exception $e) {
            Log::error('[deleteTag]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.tag.Failed delete'));
        }
    }

    protected function makeSlug($string, $separator = '-')
    {
        $string = mb_strtolower($string, 'UTF-8');
        $string = preg_replace('/\s+/', $separator, $string);
        $string = preg_replace('/[^\p{L}\p{N}]+/u', $separator, $string);
        $string = preg_replace('/' . preg_quote($separator) . '+/', $separator, $string);
        $string = trim($string, $separator);

        return $string;
    }

    public function resetFields()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function resetFilters()
    {
        $this->resetFields();
        $this->dispatch('urlReset', route('admin.tags'));
    }

    public function render()
    {
        $columns = ['id', 'name', 'slug', 'posts_count'];
        $headers = [trans('dashboard.table.Id'), trans('dashboard.table.Name'), trans('dashboard.table.Slug'), trans('dashboard.table.Articles'), trans('dashboard.table.Actions')];
        $perPages = [5, 10, 20, 50];

        $rows = Tag::withCount('posts')
            ->when($this->searchBy === 'posts_count', function ($query) {
                $query->having('posts_count', 'like', "%{$this->search}%");
            }, function ($query) {
                $query->where($this->searchBy, 'like', "%{$this->search}%");
            })
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);

        return view('admin.pages.tables.tags.tag-table', compact('headers', 'columns', 'rows', 'perPages'))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
