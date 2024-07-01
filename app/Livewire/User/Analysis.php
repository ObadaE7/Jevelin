<?php

namespace App\Livewire\User;

use App\Models\Post;
use Livewire\Component;

class Analysis extends Component
{
    public function totalArticles()
    {
        $id = auth()->id();
        return Post::where('user_id', $id)->count();
    }

    public function totalReactions()
    {
        $id = auth()->id();
        $posts = Post::withCount(['likes', 'dislikes'])
            ->where('user_id', $id)
            ->get();
        return $posts->sum(function ($post) {
            return $post->likes_count + $post->dislikes_count;
        });
    }

    public function averageReactionPerArticle()
    {
        $totalArticles = $this->totalArticles();
        $totalReactions = $this->totalReactions();
        return $totalArticles === 0 ? 0 : ($totalReactions / $totalArticles);
    }

    public function topFiveArticles()
    {
        $id = auth()->id();
        return Post::withCount('likes')
            ->having('likes_count', '>', 0)
            ->where('user_id', $id)
            ->orderByDesc('likes_count')
            ->take(5)
            ->get();
    }

    public function topFiveArticlesChart()
    {
        $topFiveArticles = $this->topFiveArticles();
        $articleId = $topFiveArticles->pluck('id')->toArray();
        $likeCounts = $topFiveArticles->pluck('likes_count')->toArray();

        return compact('articleId', 'likeCounts');
    }

    public function articlesPerDayChart()
    {
        $id = auth()->id();
        return Post::where('user_id', $id)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();
    }

    public function reactionsChart()
    {
        $id = auth()->id();
        $posts = Post::withCount(['likes', 'dislikes'])->where('user_id', $id)->get();
        $totalLikes = $posts->sum('likes_count');
        $totalDislikes = $posts->sum('dislikes_count');

        return compact('totalLikes', 'totalDislikes');
    }

    public function render()
    {
        $totalArticles = $this->totalArticles();
        $totalReactions = $this->totalReactions();
        $totalReactions = $this->totalReactions();
        $averageReactionPerArticle = $this->averageReactionPerArticle();
        $topFiveArticles = $this->topFiveArticles();
        $articlesPerDayChart = $this->articlesPerDayChart();
        $reactionsChart = $this->reactionsChart();
        $topFiveArticlesChart = $this->topFiveArticlesChart();

        return view('pages.dashboard.analysis', compact(
            'totalArticles',
            'totalReactions',
            'averageReactionPerArticle',
            'topFiveArticles',
            'topFiveArticlesChart',
            'articlesPerDayChart',
            'reactionsChart',
        ))->extends('layouts.dashboard')->section('content');
    }
}
