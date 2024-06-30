<?php

namespace App\Livewire\User;

use App\Models\Notification;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class HeaderNotification extends Component
{
    public $unreadCount;
    public $showAllNotifications = false;

    public function updateUnreadCount()
    {
        $this->unreadCount = auth()->user()->notifications()->whereNull('read_at')->count();
    }

    public function getNotifications()
    {
        $notifications = auth()->user()->notifications()->orderByDesc('created_at');
        return $this->showAllNotifications ? $notifications->get() : $notifications->take(3)->get();
    }

    public function markAllAsRead()
    {
        auth()->user()->notifications()->whereNull('read_at')->update(['read_at' => Carbon::now()]);
        $this->updateUnreadCount();
    }

    public function markAsRead($id)
    {
        $notification = Notification::find($id);

        if ($notification && $notification->read_at === null) {
            $notification->update(['read_at' => Carbon::now()]);
            $this->updateUnreadCount();
        }
    }

    public function delete($id)
    {
        Notification::find($id)->delete();
        $this->updateUnreadCount();
    }

    public function toggleShowAllNotifications()
    {
        $this->showAllNotifications = !$this->showAllNotifications;
    }

    #[On('comment-created')]
    public function updated()
    {
        $this->getNotifications();
        $this->updateUnreadCount();
    }

    public function mount()
    {
        $this->updateUnreadCount();
    }

    public function render()
    {
        $notifications = $this->getNotifications();
        return view('includes.dashboard.header-notification', compact('notifications'));
    }
}
