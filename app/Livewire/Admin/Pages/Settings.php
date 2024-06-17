<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Component;

class Settings extends Component
{
    public function render()
    {
        return view('admin.pages.settings')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
