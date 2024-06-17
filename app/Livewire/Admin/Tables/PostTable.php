<?php

namespace App\Livewire\Admin\Tables;

use Livewire\Component;

class PostTable extends Component
{
    public function render()
    {
        return view('admin.pages.tables.post-table')
            ->extends('admin.pages.dashboard')
            ->section('content');
    }
}
