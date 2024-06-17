<?php

namespace App\Livewire\User;

use Livewire\Component;

class Posts extends Component
{
    public function render()
    {
        return view('pages.posts')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
