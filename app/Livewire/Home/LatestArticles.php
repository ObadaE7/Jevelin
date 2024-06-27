<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Livewire\Component;

class LatestArticles extends Component
{
    public function getLatestArticles()
    {
        return Post::withCount(['likes', 'dislikes'])->latest()->take(3)->get();
    }

    public function render()
    {
        $latestArticles = $this->getLatestArticles();

        return view('pages.home.latest-articles', compact('latestArticles'));
    }
}
