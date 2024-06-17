<?php

namespace App\Livewire\Admin\Tables;

use App\Models\Role;
use App\Traits\FilterTrait;
use Livewire\{Component, WithPagination};

class RoleTable extends Component
{
    use WithPagination, FilterTrait;

    public $columns;
    public $name;
    public $description;
    public $perPages;

    public function render()
    {
        $this->columns = ['id', 'name', 'description'];
        $headers = ['Id', 'Name', 'Description', 'Actions'];
        $this->perPages = [5, 10, 20, 50];
        $rows = Role::where($this->searchBy, 'like', "%{$this->search}%")
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);

        return view('admin.pages.tables.role-table', compact('headers', 'rows',))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
