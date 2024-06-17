<?php

namespace App\Livewire\Admin\Tables;

use App\Models\Country;
use App\Traits\FilterTrait;
use Livewire\{Component, WithPagination};

class CountryTable extends Component
{
    use WithPagination, FilterTrait;

    public $columns;
    public $name;
    public $description;
    public $perPages;

    public function render()
    {
        $this->columns = ['name', 'flag', 'email'];
        $headers = ['Name', 'Flag', 'Actions'];
        $this->perPages = [5, 10, 20, 50];
        $rows = Country::where($this->searchBy, 'like', "%{$this->search}%")
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);

        return view('admin.pages.tables.country-table', compact('rows', 'headers'))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
