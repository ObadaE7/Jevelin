<?php

namespace App\Livewire\Admin\Tables;

use Livewire\Component;

class PostTable extends Component
{
    public function render()
    {
        return view('admin.pages.tables.post-table')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
