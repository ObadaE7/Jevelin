<?php

namespace App\Livewire\User;

use Livewire\Component;

class CreatePost extends Component
{
    public function render()
    {
        return view('pages.create-post')
        ->extends('layouts.dashboard')
        ->section('content');
    }
}
