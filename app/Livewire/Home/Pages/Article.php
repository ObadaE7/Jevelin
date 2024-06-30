<?php

namespace App\Livewire\Home\Pages;

use App\Models\Post;
use Livewire\Component;

class Article extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function getArticle()
    {
        return Post::where('slug', $this->slug)->first();
    }

    public function relatedArticles()
    {
        $post = $this->getArticle();
        return Post::where('user_id', $post->owner->id)->inRandomOrder()->take(3)->get();
    }

    public function render()
    {
        $article = $this->getArticle();
        $relatedArticles = $this->relatedArticles();

        return view('pages.home.pages.article', compact('article', 'relatedArticles'))->layout('layouts.guest');
    }
}
