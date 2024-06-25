<?php

namespace App\Livewire\Home\Pages;

use Livewire\Component;

class Categories extends Component
{
    public function render()
    {
        return view('pages.home.pages.categories')->layout('layouts.guest');
    }
}
