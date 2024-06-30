<div class="d-flex gap-3 mt-4 comment-container flex-column-md">
    @if ($comment->user->avatar)
        <img src="{{ asset('storage/' . $comment->user->avatar) }}" class="avatar" alt="{{ $comment->user->uname }}">
    @else
        <div class="avatar__subtle">
            <span>{{ Str::upper(Str::substr($comment->user->fname, 0, 1) . Str::substr($comment->user->lname, 0, 1)) }}</span>
        </div>
    @endif

    <div class="d-flex flex-column comment-content">
        <div class="bg-light rounded p-3">
            <div class="d-flex justify-content-between mb-3">
                <div class="d-flex flex-column lh-1">
                    <span>{{ $comment->user->fname . ' ' . $comment->user->lname }}</span>
                    @if ($comment->user->role_id)
                        <small class="text-muted">
                            {{ optional(App\Models\Role::find($comment->user->role_id))->name ?? trans('index.comments.Undefined') }}
                        </small>
                    @else
                        <small class="text-muted">(@lang('index.comments.Undefined'))</small>
                    @endif
                </div>
                <small>{{ $comment->created_at->diffForHumans() }}</small>
            </div>

            @if ($comment->parent_id)
                @php
                    $parentComment = App\Models\Comment::find($comment->parent_id);
                    $parentUser = $parentComment ? $parentComment->user : null;
                @endphp
                @if ($parentUser)
                    <span class="badge bg-primary-subtle text-primary">
                        @lang('index.comments.Reply to') {{ $parentUser->fname . ' ' . $parentUser->lname }}
                    </span>
                @endif
            @endif

            <span class="fw-medium">{{ $comment->comment }}</span>
        </div>

        <div class="d-flex gap-4 mt-2">
            <div>
                <span class="badge bg-primary-subtle text-primary me-1">{{ $comment->likes->count() }}</span>
                @php
                    $isLiked = $comment->likes->where('user_id', auth()->id())->isNotEmpty();
                @endphp
                @auth
                    <button wire:click="likeComment({{ $comment->id }})" class="{{ $isLiked ? 'text-primary' : '' }}">
                        @lang('index.comments.Like')
                    </button>
                @else
                    <button type="button" data-bs-toggle="tooltip" data-bs-custom-class="primary-tooltip"
                        data-bs-title="@lang('index.comments.Login first')">
                        @lang('index.comments.Like')
                    </button>
                @endauth
            </div>
            <button wire:click="setParent({{ $comment->id }})">@lang('index.comments.Reply')</button>
            @if (auth()->id() == $comment->user_id)
                <button wire:click="delete({{ $comment->id }})">@lang('index.comments.Remove')</button>
            @endif
        </div>

        @if ($parent_id === $comment->id)
            <div class="mt-4">
                @auth
                    <div class="comment__wrapper">
                        <form>
                            <div class="d-flex align-items-center justify-content-end position-relative">
                                <textarea wire:model="comment" class="form-control" placeholder="@lang('index.comments.Write reply')" required></textarea>
                                <div class="position-absolute">
                                    <button wire:click.prevent='create' class="btn text-bg-danger btn__send"
                                        type="button"></button>
                                </div>
                            </div>
                            <x-error name="comment" />
                            <button wire:click.prevent="cancelReply" type="button">@lang('index.comments.Cancel')</button>
                        </form>
                    </div>
                @else
                    <div class="d-flex align-items-center justify-content-end position-relative">
                        <textarea class="form-control" placeholder="@lang('index.comments.Write reply')" disabled></textarea>
                        <div class="position-absolute">
                            <a href="{{ route('login') }}" class="btn btn-danger me-3">@lang('index.comments.Login first')</a>
                        </div>
                    </div>
                @endauth
            </div>
        @endif

        @foreach ($comment->replies as $reply)
            @include('components.comment-item', ['comment' => $reply])
        @endforeach
    </div>
</div>

@push('scripts')
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script>
        toolTip();
    </script>
@endpush
