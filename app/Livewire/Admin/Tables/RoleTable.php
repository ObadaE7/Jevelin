<?php

namespace App\Livewire\Admin\Tables;

use Livewire\Component;

class RoleTable extends Component
{
    public function render()
    {
        return view('admin.pages.tables.role-table')
            ->extends('admin.pages.dashboard')
            ->section('content');
    }
}
