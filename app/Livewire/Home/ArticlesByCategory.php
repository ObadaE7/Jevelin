<?php

namespace App\Livewire\Home;

use App\Models\Category;
use Livewire\Component;

class ArticlesByCategory extends Component
{
    public $categorySearch;

    public function getArticlesByCategory()
    {
        return Category::withCount('posts')
            ->where('name', 'like', "%{$this->categorySearch}%")
            ->orderByDesc('posts_count')
            ->take(6)
            ->get();
    }

    public function getTotalCategories()
    {
        return Category::count();
    }

    public function render()
    {
        $articlesByCategory = $this->getArticlesByCategory();
        $totalCategories = $this->getTotalCategories();

        return view('pages.home.articles-by-category', compact('totalCategories', 'articlesByCategory'));
    }
}
