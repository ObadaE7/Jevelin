<?php

namespace App\Livewire\User;

use App\Models\Post;
use App\Traits\FilterTrait;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination, FilterTrait;

    public function getArticles()
    {
        return Post::withCount(['likes', 'dislikes'])
            ->where('user_id', auth()->id())
            ->where($this->searchBy, 'like', "%{$this->search}%")
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);
    }

    public function render()
    {
        $articles = $this->getArticles();
        $columns = ['title', 'subtitle'];
        $perPages = [5, 10];

        return view('pages.posts', compact('articles', 'columns', 'perPages'))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
