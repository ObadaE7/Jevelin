<?php

namespace App\Livewire\Admin\Tables;

use Livewire\Component;

class UserTable extends Component
{
    public function render()
    {
        return view('admin.pages.tables.user-table')
            ->extends('admin.pages.dashboard')
            ->section('content');
    }
}
