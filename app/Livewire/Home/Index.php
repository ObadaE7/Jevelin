<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public $email;

    public function latestArticles()
    {
        return Post::withCount(['likes', 'dislikes'])->latest()->take(3)->get();
    }

    public function topPost()
    {
        return Post::withCount('users')->orderByDesc('users_count')->first();
    }

    public function topPosts()
    {
        return Post::withCount('users')->orderByDesc('users_count')->take(2)->skip(1)->get();
    }

    public function subscribe()
    {
        dd($this->email);
    }

    public function render()
    {
        $latestArticles = $this->latestArticles();
        $topPost = $this->topPost();
        $topPosts = $this->topPosts();

        return view('pages.home.index', compact('latestArticles', 'topPost', 'topPosts'))->layout('layouts.guest');
    }
}
