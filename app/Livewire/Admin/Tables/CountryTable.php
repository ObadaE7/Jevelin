<?php

namespace App\Livewire\Admin\Tables;

use Livewire\Component;

class CountryTable extends Component
{
    public function render()
    {
        return view('admin.pages.tables.country-table')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
