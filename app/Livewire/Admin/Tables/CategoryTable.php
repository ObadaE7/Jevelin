<?php

namespace App\Livewire\Admin\Tables;

use App\Models\Category;
use App\Traits\FilterTrait;
use Livewire\{Component, WithPagination};

class CategoryTable extends Component
{
    use WithPagination, FilterTrait;

    public $columns;
    public $name;
    public $description;
    public $perPages;

    public function render()
    {
        $this->columns = ['image', 'name', 'slug', 'description'];
        $headers = ['Image', 'Name', 'Slug', 'Description', 'Actions'];
        $this->perPages = [5, 10, 20, 50];
        $rows = Category::where($this->searchBy, 'like', "%{$this->search}%")
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);

        return view('admin.pages.tables.category-table', compact('rows', 'headers'))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}