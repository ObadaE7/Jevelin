<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Livewire\Component;

class TopArticles extends Component
{
    public function getTopPost()
    {
        return Post::
        first();
    }

    public function getTopPosts()
    {
        return Post::
        take(2)->skip(1)->get();
    }

    public function render()
    {
        $topPost = $this->getTopPost();
        $topPosts = $this->getTopPosts();

        return view('pages.home.top-articles', compact('topPost', 'topPosts'));
    }
}
