<?php

namespace App\Livewire\Admin\Tables;

use App\Models\Post;
use App\Traits\FilterTrait;
use Livewire\{Component, WithPagination};

class PostTable extends Component
{
    use WithPagination, FilterTrait;

    public $columns;
    public $name;
    public $description;
    public $perPages;

    public function render()
    {
        $this->columns = ['title', 'subtitle', 'slug'];
        $headers = ['Title', 'Subtitle', 'Slug', 'Actions'];
        $this->perPages = [5, 10, 20, 50];
        $rows = Post::where($this->searchBy, 'like', "%{$this->search}%")
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);
        return view('admin.pages.tables.post-table', compact('rows', 'headers'))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
