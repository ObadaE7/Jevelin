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

        <div class="pages__main article">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->slug }}">
                    <div class="d-flex flex-column mb-3">
                        <span class="fs-4">{{ $article->title }}</span>
                        <small class="text-muted mb-3">{{ $article->title }}</small>

                        <small class="text-muted">
                            بواسطة: {{ $article->owner->fname . ' ' . $article->owner->lname }}
                            <span class="ms-5">{{ $article->getDateForHuman() }}</span>
                        </small>
                    </div>

                    <p>{{ $article->content }}</p>
                </div>
            </div>
        </div>
    </main>

    @livewire('home.footer')
</section>
