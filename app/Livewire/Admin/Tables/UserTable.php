<?php

namespace App\Livewire\Admin\Tables;

use App\Models\User;
use App\Traits\FilterTrait;
use Livewire\{Component, WithPagination};

class UserTable extends Component
{
    use WithPagination, FilterTrait;

    public $columns;
    public $name;
    public $description;
    public $perPages;

    public function render()
    {
        $this->columns = ['fname', 'lname', 'email'];
        $headers = ['First Name', 'Last Name', 'Email', 'Actions'];
        $this->perPages = [5, 10, 20, 50];
        $rows = User::where($this->searchBy, 'like', "%{$this->search}%")
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);

        return view('admin.pages.tables.user-table', compact('headers', 'rows',))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
