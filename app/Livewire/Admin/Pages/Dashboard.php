<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('admin.pages.dashboard')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
