<?php

namespace App\Livewire\Admin\Tables;

use App\Models\Tag;
use App\Traits\FilterTrait;
use Livewire\{Component, WithPagination};

class TagTable extends Component
{
    use WithPagination, FilterTrait;

    public $columns;
    public $name;
    public $description;
    public $perPages;

    public function render()
    {
        $this->columns = ['id', 'name', 'slug'];
        $headers = ['Id', 'Name', 'Slug', 'Actions'];
        $this->perPages = [5, 10, 20, 50];
        $rows = Tag::where($this->searchBy, 'like', "%{$this->search}%")
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);
        return view('admin.pages.tables.tag-table', compact('rows', 'headers'))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
