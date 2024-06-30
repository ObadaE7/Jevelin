<section class="wrapper">
    @livewire('home.header')

    <main class="pages__wrapper">
        <div class="pages__header">
            <div class="d-flex align-items-center gap-2">
                <span class="material-icons-outlined">feed</span>
                <span class="fs-4">@lang('index.pages.Writers')</span>
            </div>
            <span class="text-muted">@lang('index.pages.Writers placeholder')</span>
        </div>

        <div class="pages__main articles">
            <div class="writers__wrapper">
                @forelse ($writers as $writer)
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center gap-2">
                                @if ($writer->avatar)
                                    <img src="{{ asset('storage/' . $writer->avatar) }}" class="avatar" alt="">
                                @else
                                    <div class="avatar__subtle fs-3">
                                        {{ Str::upper(Str::substr($writer->fname, 0, 1) . Str::substr($writer->lname, 0, 1)) }}
                                    </div>
                                @endif
                                <div class="d-flex flex-column align-items-center">
                                    <span>{{ $writer->fname . ' ' . $writer->lname }}</span>
                                    <small class="text-muted">
                                        {{ App\Models\Role::find($writer->role_id)->name }}
                                    </small>
                                </div>

                                <button class="btn btn-sm btn-primary w-100">@lang('index.pages.Follow')</button>
                                <button class="btn btn-sm btn-outline-danger w-100">@lang('index.pages.Message')</button>
                            </div>
                        </div>
                    </div>
                @empty
                    @lang('index.pages.Empty writers')
                @endforelse
            </div>
        </div>

        @if ($writers->total() > 10)
            <div class="pages__paginate">{{ $writers->links() }}</div>
        @endif
    </main>

    @livewire('home.footer')
</section>
