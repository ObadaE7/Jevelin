<?php

namespace App\Livewire\Home;

use App\Models\Category;
use Livewire\Component;

class ArticlesByCategory extends Component
{
    public $categorySearch;

    public function articlesByCategory()
    {
        return Category::withCount('posts')
            ->where('name', 'like', "%{$this->categorySearch}%")
            ->orderByDesc('posts_count')
            ->take(6)
            ->get();
    }

    public function totalCategories()
    {
        return Category::count();
    }

    public function render()
    {
        $articlesByCategory = $this->articlesByCategory();
        $totalCategories = $this->totalCategories();

        return view('pages.home.articles-by-category', compact('totalCategories', 'articlesByCategory'));
    }
}
