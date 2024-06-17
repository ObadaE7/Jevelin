<?php

namespace App\Livewire\Admin\Tables;

use Livewire\Component;

class TagTable extends Component
{
    public function render()
    {
        return view('admin.pages.tables.tag-table')
            ->extends('admin.pages.dashboard')
            ->section('content');
    }
}
