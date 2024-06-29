<section>
    @auth
        <form>
            <div class="d-flex align-items-center justify-content-end position-relative flex-column-md">
                <textarea wire:model="comment" class="form-control" placeholder="@lang('index.comments.Write comment')" required></textarea>
                <div class="position-absolute">
                    <button wire:click.prevent='create' class="btn text-bg-primary btn__send" type="button"></button>
                </div>
            </div>
            <x-error name="comment" />
        </form>
    @else
        <div class="d-flex align-items-center justify-content-end position-relative flex-column-md">
            <textarea class="form-control" placeholder="@lang('index.comments.Write comment')" disabled></textarea>
            <div class="position-absolute">
                <a href="{{ route('login') }}" class="btn btn-primary me-3">@lang('index.comments.Login first')</a>
            </div>
        </div>
    @endauth

    <div>
        @forelse ($comments as $comment)
            @include('components.comment-item', ['comment' => $comment])
        @empty
            <div class="bg-light rounded p-3 mt-3">@lang('index.comments.Empty comments')</div>
        @endforelse
    </div>
</section>
