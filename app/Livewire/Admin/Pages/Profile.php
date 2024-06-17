<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('admin.pages.profile')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
