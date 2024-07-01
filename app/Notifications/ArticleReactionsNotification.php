<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\PostUser;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArticleReactionsNotification extends Notification
{
    use Queueable;

    public $user;
    public $post;
    public $reactionType;

    /**
     * Create a new notification instance.
     */
    public function __construct(Post $post, $reactionType)
    {
        $this->user = auth()->user();
        $this->post = $post;
        $this->reactionType = $reactionType;
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
            'message' => $this->getReactionMessage(),
        ];
    }

    /**
     * Get the reaction message based on the type of reaction.
     *
     * @return string
     */
    private function getReactionMessage(): string
    {
        if ($this->reactionType === 'like') {
            return 'أعجب بمقالك';
        } elseif ($this->reactionType === 'dislike') {
            return 'لم يعجبه مقالك';
        } else {
            return 'تفاعل بمقالك'; // Handle any other type of reaction
        }
    }
}
