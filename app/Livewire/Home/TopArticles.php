<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Livewire\Component;

class TopArticles extends Component
{
    public function topPost()
    {
        return Post::withCount('users')->orderByDesc('users_count')->first();
    }

    public function topPosts()
    {
        return Post::withCount('users')->orderByDesc('users_count')->take(2)->skip(1)->get();
    }

    public function render()
    {
        $topPost = $this->topPost();
        $topPosts = $this->topPosts();

        return view('pages.home.top-articles', compact('topPost', 'topPosts'));
    }
}
