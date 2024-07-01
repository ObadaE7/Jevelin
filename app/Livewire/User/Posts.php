<?php

namespace App\Livewire\User;

use App\Models\Post;
use App\Traits\FilterTrait;
use Livewire\{Component, WithPagination};

class Posts extends Component
{
    use WithPagination, FilterTrait;

    public function getArticles()
    {
        return Post::where('user_id', auth()->id())
            ->withCount([
                'reactions as likes_count' => function ($query) {
                    $query->where('type', 1);
                },
                'reactions as dislikes_count' => function ($query) {
                    $query->where('type', 0);
                },
            ])
            ->where($this->searchBy, 'like', "%{$this->search}%")
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);
    }

    public function render()
    {
        $articles = $this->getArticles();
        $columns = ['title', 'subtitle'];
        $perPages = [5, 10];

        return view('pages.dashboard.posts', compact('articles', 'columns', 'perPages'))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
