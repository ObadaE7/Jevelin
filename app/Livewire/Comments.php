<?php

namespace App\Livewire;

use App\Models\{Post, Comment, CommentLike};
use Livewire\Component;

class Comments extends Component
{
    public $article;
    public $comment;
    public $parent_id = null;

    public function mount(Post $article)
    {
        $this->article = $article;
    }

    public function create()
    {
        $this->validate([
            'comment' => 'required|string|max:500',
        ]);

        Comment::create([
            'post_id' => $this->article->id,
            'user_id' => auth()->id(),
            'comment' => $this->comment,
            'parent_id' => $this->parent_id,
        ]);

        $this->reset(['comment', 'parent_id']);
    }

    public function delete($id)
    {
        Comment::findOrFail($id)->delete();
    }

    public function setParent($id)
    {
        $this->parent_id = $id;
    }

    public function cancelReply()
    {
        $this->parent_id = null;
        $this->reset(['comment', 'parent_id']);
        $this->resetErrorBag();
    }

    public function likeComment($id)
    {
        $like = CommentLike::where('comment_id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if ($like) {
            $like->delete();
        } else {
            CommentLike::create([
                'comment_id' => $id,
                'user_id' => auth()->id(),
            ]);
        }
    }

    public function getComments()
    {
        return $this->article->comments()->whereNull('parent_id')->with('user')->latest()->get();
    }

    public function render()
    {
        $comments = $this->getComments();
        return view('components.comments', compact('comments'));
    }
}
