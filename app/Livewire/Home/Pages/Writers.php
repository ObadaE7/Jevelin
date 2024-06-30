<?php

namespace App\Livewire\Home\Pages;

use App\Models\User;
use Livewire\Component;

class Writers extends Component
{

    public function getWriters()
    {
        return User::whereNotNull('role_id')
            ->whereHas('posts', function ($query) {
                $query->whereNotNull('user_id');
            })
            ->with('posts')
            ->paginate(10);
    }

    public function render()
    {
        $writers = $this->getWriters();

        return view('pages.home.pages.writers', compact('writers'))->layout('layouts.guest');
    }
}
