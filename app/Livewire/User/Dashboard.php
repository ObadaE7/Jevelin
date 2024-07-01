<?php

namespace App\Livewire\User;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('pages.dashboard.dashboard')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
