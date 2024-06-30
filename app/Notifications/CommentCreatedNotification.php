<?php

namespace App\Notifications;

use App\Events\CommentCreatedNotificationEvent;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentCreatedNotification extends Notification
{
    use Queueable;

    public $user;
    public $post;

    /**
     * Create a new notification instance.
     */
    public function __construct(Comment $comment)
    {
        $this->user = User::find($comment->user_id);
        $this->post = Post::find($comment->post_id);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => trans('mail.notifications.Commented'),
            'url' => route('article', $this->post->slug),
        ];
    }
}
