<?php

namespace App\Livewire\User;

use Livewire\Component;

class Analysis extends Component
{
    public function render()
    {
        return view('pages.analysis')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
