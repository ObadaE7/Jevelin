<section class="main__section-two">
    <div class="main__section-header">
        <span class="section__title">@lang('index.sections.Section two title')</span>
        <span class="section__subtitle">@lang('index.sections.Section two subtitle')</span>
    </div>

    <div class="section__two-content">
        @isset($topPost)
            <div class="section__two-right">
                <img src="{{ asset('storage/' . $topPost->image) }}" alt="{{ $topPost->slug }}">
                <div class="overlay-text"></div>
                <div class="col__right-badge">
                    <a href="#" class="post__badge">@lang('index.sections.Most liked')</a>
                </div>

                <div class="col__content">
                    <a href="{{ route('article', $topPost->slug) }}" class="post__title">{{ $topPost->title }}</a>
                    <span class="post__subtitle">{{ $topPost->subtitle }}</span>

                    <div class="col__right-owner">
                        <div class="d-flex gap-2">
                            <span class="material-icons-outlined">person_3</span>
                            <span>{{ $topPost->owner->fname . ' ' . $topPost->owner->lname }}</span>
                        </div>
                        <span>{{ $topPost->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        @endisset

        <div class="d-flex flex-column align-items-center">
            <span class="fs-3">@lang('index.sections.Empty line one')</span>
            <span class="fs-4">@lang('index.sections.Empty line two')</span>
        </div>

        @isset($topPosts)
            <div class="section__two-left">
                @foreach ($topPosts as $top)
                    <div class="section__two-row">
                        <img src="{{ asset('storage/' . $top->image) }}" alt="{{ $top->slug }}">
                        <div class="overlay-text"></div>
                        <div class="col__content">
                            <a href="{{ route('article', $top->slug) }}" class="post__title">{{ $top->title }}</a>
                            <span class="post__subtitle">{{ $top->subtitle }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endisset
    </div>
</section>
