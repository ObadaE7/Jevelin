<div class="dropdown">
    <button class="li__btn notifications" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false"
        aria-expanded="false">
    </button>
    <span class="li__btn-badge notifications count__notify">{{ $unreadCount }}</span>
    <ul id="notificationDropdown" class="dropdown-menu dropdown-menu-end text-end drop-notify">
        <li>
            <div class="dropdown-item d-flex justify-content-between">
                <span class="fw-medium">@lang('dashboard.aside.ALL Notification')</span>
                <button wire:click.prevent='markAllAsRead'
                    class="text-primary {{ $unreadCount <= 0 ? 'text-muted' : '' }}"
                    {{ $unreadCount <= 0 ? 'disabled' : '' }}>
                    @lang('dashboard.aside.Mark all')
                </button>
            </div>
        </li>

        <li>
            <div class="dropdown-divider"></div>
        </li>

        @forelse ($notifications as $notification)
            <li>
                <div class="dropdown-item">
                    @php
                        $user = App\Models\User::find($notification->user_id);
                    @endphp
                    <div class="notification__wrapper">
                        <div class="notification__item-top">
                            <div class="item__top-img">
                                @if ($user->avatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}" class="avatar"
                                        alt="{{ $user->uname }}">
                                @else
                                    <div class="avatar__subtle">
                                        <span>{{ Str::upper(Str::substr($user->fname, 0, 1) . Str::substr($user->lname, 0, 1)) }}</span>
                                    </div>
                                @endif
                                <div class="d-flex flex-column">
                                    <span>{{ $user->fname . ' ' . $user->lname }}</span>
                                    <span>
                                        {{ $notification->data['message'] }}
                                        <a href="{{ $notification->data['url'] }}">@lang('dashboard.aside.View article')</a>
                                    </span>
                                </div>
                            </div>

                            <div class="item__top-icon">
                                <span
                                    class="material-icons-outlined fs-6 {{ $notification->read_at ?? 'text-primary' }}">message</span>
                            </div>
                        </div>

                        <div class="notification__item-bottom">
                            <div>{{ $notification->created_at->diffForHumans() }}</div>
                            <div class="d-flex gap-4">
                                <button
                                    wire:click.prevent='markAsRead({{ $notification->id }})'>@lang('dashboard.aside.Mark')</button>
                                <button wire:click.prevent='delete({{ $notification->id }})'>@lang('dashboard.aside.Delete')</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
            </li>
        @empty
            <li>
                <div class="dropdown-item text-center">@lang('dashboard.aside.Empty notification')</div>
                <div class="dropdown-divider"></div>
            </li>
        @endforelse
        <li>
            <div class="dropdown-item d-flex justify-content-center">
                <button wire:click.prevent="toggleShowAllNotifications">@lang('dashboard.aside.View all')</button>
            </div>
        </li>
    </ul>
</div>
