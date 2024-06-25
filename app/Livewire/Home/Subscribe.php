<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Subscribe extends Component
{
    public $email;

    public function subscribe()
    {
        dd($this->email);
    }

    public function render()
    {
        return view('pages.home.subscribe');
    }
}
