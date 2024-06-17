<?php

namespace App\Livewire\User;

use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('pages.profile')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
