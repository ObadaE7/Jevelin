<?php

namespace App\Livewire\User;

use App\Models\Post;
use Livewire\Component;

class Analysis extends Component
{
    public function totalArticles()
    {
        return Post::where('user_id', auth()->id())->count();
    }

    public function totalReactions()
    {
        return Post::where('user_id', auth()->id())
            ->withCount('reactions')
            ->get()
            ->sum('reactions_count');
    }

    public function averageReactionPerArticle()
    {
        $totalArticles = $this->totalArticles();
        $totalReactions = $this->totalReactions();
        return $totalArticles === 0 ? 0 : ($totalReactions / $totalArticles);
    }

    public function topFiveArticles()
    {
        return Post::where('user_id', auth()->id())
            ->withCount(['reactions as likes_count' => function ($query) {
                $query->where('type', 1);
            }])
            ->having('likes_count', '>', 0)
            ->orderByDesc('likes_count')
            ->take(5)
            ->get();
    }

    public function topFiveArticlesChart()
    {
        $topFiveArticles = $this->topFiveArticles();
        $articleId = $topFiveArticles->pluck('id')->toArray();
        $likesCount = $topFiveArticles->pluck('likes_count')->toArray();
        return compact('articleId', 'likesCount');
    }

    public function articlesPerDayChart()
    {
        return Post::where('user_id', auth()->id())
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();
    }

    public function reactionsChart()
    {
        $posts = Post::where('user_id', auth()->id())
            ->withCount([
                'reactions as likes_count' => function ($query) {
                    $query->where('type', 1);
                },
                'reactions as dislikes_count' => function ($query) {
                    $query->where('type', 0);
                },
            ])->get();
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
