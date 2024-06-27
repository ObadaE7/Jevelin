<?php

namespace App\Livewire\Admin\Tables;

use App\Models\Category;
use Livewire\{Component, WithPagination};
use App\Traits\{FilterTrait, ImageProcessTrait, ModalTrait};
use Illuminate\Support\Facades\{Storage, Log};
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Exception;

class CategoryTable extends Component
{
    use WithPagination, WithFileUploads, FilterTrait, ModalTrait, ImageProcessTrait;

    public $rowId;
    public $name;
    public $slug;
    public $image;
    public $description;

    public function updatedName()
    {
        $this->slug = str()->slug($this->name);
    }

    public function create()
    {
        $validated =   $this->validate([
            'name' => 'required|string|max:25|unique:categories,name,',
            'slug' => 'required|string|unique:categories,slug,',
            'description' => 'required|string',
            'image' => 'required|file|image|mimes:jpg,jpeg,png|max:1024,',
        ]);

        try {
            $validated['image'] = $this->coverImage($validated['image'], 300, 300, 'categories/public');

            Category::create($validated);
            session()->flash('success', trans('alerts.category.Created'));
            $this->resetFields();
            $this->closeModal('createModal');
        } catch (Exception $e) {
            Log::error('[createCategory]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.category.Failed create'));
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->rowId = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->description = $category->description;
    }

    public function update($id)
    {
        $category = Category::findOrFail($id);
        $validated =   $this->validate([
            'name' => 'required|string|max:25|unique:categories,name,' . $category->id,
            'slug' => 'required|string|unique:categories,slug,' . $category->id,
            'description' => 'required|string',
            'image' => 'required|file|image|mimes:jpg,jpeg,png|max:1024,',
        ]);

        try {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }

            $validated['image'] = $this->coverImage($validated['image'], 300, 300, 'categories/public');

            $category->update($validated);
            session()->flash('success', trans('alerts.category.Updated'));
            $this->resetFields();
            $this->closeModal('editModal');
        } catch (Exception $e) {
            Log::error('[updateCategory]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.category.Failed update'));
        }
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        try {
            if ($category) {
                $category->delete();
                session()->flash('success', trans('alerts.category.Deleted'));
                $this->closeModal('deleteModal');
            } else {
                session()->flash('error', trans('alerts.category.Not found'));
            }
        } catch (Exception $e) {
            Log::error('[deleteCategory]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.category.Failed delete'));
        }
    }

    public function resetFields()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function resetFilters()
    {
        $this->resetFields();
        $this->dispatch('urlReset', route('admin.categories'));
    }

    public function render()
    {
        $columns = ['id', 'image', 'name', 'slug'];
        $headers = [trans('dashboard.table.Id'), trans('dashboard.table.Image'), trans('dashboard.table.Name'), trans('dashboard.table.Slug'), trans('dashboard.table.Actions')];
        $perPages = [5, 10, 20, 50];
        $rows = Category::where($this->searchBy, 'like', "%{$this->search}%")
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);

        return view('admin.pages.tables.categories.category-table', compact('headers', 'columns', 'rows', 'perPages'))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
