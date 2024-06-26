<section class="wrapper">
    @livewire('home.header')

    <main class="pages__wrapper">
        <div class="pages__header">
            <div class="d-flex align-items-center gap-2">
                <span class="material-icons-outlined">category</span>
                <span class="fs-4">
                    {!! trans('index.pages.Category type', ['category' => $data['category']->name]) !!}
                </span>
            </div>
            <span class="text-muted">
                @lang('index.pages.Category placeholder type', ['category' => $data['category']->name])
            </span>
        </div>

        <div class="pages__main articles-by-category">
            @forelse ($data['articles'] as $article)
                <div class="card">
                    <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->slug }}">
                    <div class="card-body">
                        <div class="d-flex flex-column gap-3 h-100">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="d-flex flex-column">
                                    <span class="fs-5">{{ $article->title }}</span>
                                    <small class="text-muted">{{ $article->subtitle }}</small>
                                </div>
                                <div class="d-flex align-items-center gap-2 text-muted">
                                    <span class="material-icons-outlined">calendar_month</span>
                                    <span>{{ $article->created_at->diffForHumans() }}</span>
                                </div>
                            </div>

                            <small class="post__content">{{ $article->content }}</small>

                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <a href="{{ route('article', $article->slug) }}" class="btn px-5">
                                    @lang('index.pages.Read more')
                                </a>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="material-icons-outlined text-primary">thumb_up</span>
                                    <span class="text-muted">{{ $article->likes_count }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                @lang('index.pages.Empty category type')
            @endforelse
        </div>

        @if ($data['articles']->total() > 4)
            <div class="pages__paginate">{{ $data['articles']->links() }}</div>
        @endif
    </main>

    @livewire('home.footer')
</section>
