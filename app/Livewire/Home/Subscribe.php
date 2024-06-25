<?php

namespace App\Livewire\Home;

use Livewire\Component;
use Exception;
use App\Models\Subscribers;
use App\Mail\WelcomeSubscribe;
use Illuminate\Support\Facades\{Mail, Log};

class Subscribe extends Component
{
    public $email;

    public function subscribe()
    {
        $validated = $this->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        try {
            Subscribers::create($validated);
            Mail::to($validated['email'])->send(new WelcomeSubscribe());
            session()->flash('success', 'You have successfully subscribed to the newsletter!');
            $this->reset('email');
        } catch (Exception $e) {
            Log::error('[subscribe]: ' . $e->getMessage());
            session()->flash('error', 'Failed to subscribe');
        }
    }

    public function render()
    {
        return view('pages.home.subscribe');
    }
}
