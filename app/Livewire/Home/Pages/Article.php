<?php

namespace App\Livewire\Home\Pages;

use Livewire\Component;

class Article extends Component
{
    public function render()
    {
        return view('pages.home.pages.article')->layout('layouts.guest');
    }
}
