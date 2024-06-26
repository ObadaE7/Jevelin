<section class="wrapper">
    @livewire('home.header')

    <main class="pages__wrapper">
        <div class="pages__header">
            <div class="d-flex align-items-center gap-2">
                <span class="material-icons-outlined">feed</span>
                <span class="fs-4">@lang('index.pages.Articles')</span>
            </div>
            <span class="text-muted">@lang('index.pages.Articles placeholder')</span>
        </div>

        <div class="pages__main articles">
            @forelse ($articles as $article)
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <div class="pages__articles-content">
                                <div
                                    class="owner-info d-flex flex-column align-items-center justify-content-center gap-2">
                                    <img src="{{ asset('storage/' . $article->owner->avatar) }}" class="avatar"
                                        alt="{{ $article->slug }}">
                                    <span>{{ $article->owner->fname . ' ' . $article->owner->lname }}</span>
                                </div>

                                <div class="article-info d-flex flex-column gap-3">
                                    <div class="title-subtitle d-flex flex-column">
                                        <span>{{ $article->title }}</span>
                                        <small class="text-muted">{{ $article->subtitle }}</small>
                                    </div>
                                    <small class="post__content text-muted">{{ $article->content }}</small>
                                    <a href="{{ route('article', $article->slug) }}"
                                        class="btn w-25">@lang('index.pages.Read more')</a>
                                </div>

                                <img src="{{ asset('storage/' . $article->image) }}" class="card-img"
                                    alt="{{ $article->slug }}">
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                @lang('index.pages.Empty article')
            @endforelse
        </div>

        @if ($articles->total() > 5)
            <div class="pages__paginate">{{ $articles->links() }}</div>
        @endif
    </main>

    @livewire('home.footer')
</section>
