<?php

namespace App\Livewire\Home;

use App\Events\ArticleReactionEvent;
use App\Models\{Post, Reaction};
use App\Notifications\ArticleReactionsNotification;
use Illuminate\Support\Facades\{Auth, Notification};
use Livewire\Attributes\On;
use Livewire\Component;

class LatestArticles extends Component
{
    public function getLatestArticles()
    {
        return Post::withCount([
            'reactions as likes_count' => function ($query) {
                $query->where('type', 1);
            },
            'reactions as dislikes_count' => function ($query) {
                $query->where('type', 0);
            }
        ])->latest()->take(3)->get();
    }

    private function toggleReaction($postId, $type)
    {
        if (!Auth::check()) {
            return;
        }

        $user = Auth::user();
        $post = Post::find($postId);

        $oppositeType = $type == 1 ? 0 : 1;

        Reaction::where('user_id', $user->id)
            ->where('type', $oppositeType)
            ->where('likable_id', $post->id)
            ->where('likable_type', get_class($post))
            ->delete();

        $existingReaction = Reaction::where('user_id', $user->id)
            ->where('type', $type)
            ->where('likable_id', $post->id)
            ->where('likable_type', get_class($post))
            ->first();

        if ($existingReaction) {
            $existingReaction->delete();
        } else {
            Reaction::create([
                'user_id' => $user->id,
                'type' => $type,
                'likable_id' => $post->id,
                'likable_type' => get_class($post),
            ]);
            $reactionType = $type == 1 ? 'like' : 'dislike';
            Notification::send($post->owner, new ArticleReactionsNotification($post, $reactionType));
        }
        $this->dispatch('push-reaction');
    }

    #[On('push-reaction')]
    public function notifyArticleReaction()
    {
        event(new ArticleReactionEvent());
    }

    public function like($id)
    {
        $this->toggleReaction($id, 1);
    }

    public function dislike($id)
    {
        $this->toggleReaction($id, 0);
    }

    public function render()
    {
        $latestArticles = $this->getLatestArticles();
        return view('pages.home.latest-articles', compact('latestArticles'));
    }
}
