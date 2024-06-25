<section class="main__section-one" id="explore">
    <div class="main__section-header">
        <span class="section__title">@lang('index.sections.Section one title')</span>
        <span class="section__subtitle">@lang('index.sections.Section one subtitle')</span>
    </div>

    <div class="section__one-content">
        @forelse ($latestArticles as $article)
            <article class="section__one-post">
                <figure class="section__one-post--img flash-animation">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->slug }}">
                </figure>

                <div class="section__one-post--content">
                    <header class="d-flex justify-content-between align-items-center">
                        @foreach ($article->tags->take(1) as $tag)
                            <a href="{{ route('articles.tagged', $tag->slug) }}"
                                class="post__badge bg-danger-subtle text-danger">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                        <time datetime="2024-05-16" class="d-flex align-items-center gap-2 muted-color">
                            <span>{{ $article->getDateForHuman() }}</span>
                            <span class="material-icons-outlined">today</span>
                        </time>
                    </header>

                    <div class="d-flex flex-column mb-4">
                        <a href="{{ route('article', $article->slug) }}" class="post__title underline__hover">
                            {{ $article->title }}
                        </a>
                        <p class="post__subtitle">{{ $article->subtitle }}</p>
                    </div>

                    <section class="post__content">
                        <p class="m-0">{{ $article->content }}</p>
                    </section>

                    <a href="{{ route('article', $article->slug) }}" class="btn__read-more">@lang('index.sections.Read more')</a>

                    <footer class="post__footer">
                        <div class="d-flex align-items-center gap-2">
                            @if (empty($article->owner->avatar))
                                <div class="avatar__subtle bg-secondary-subtle text-secondary">
                                    {{ Str::ucfirst(Str::substr($article->owner->fname, 0, 1) . Str::substr($article->owner->lname, 0, 1)) }}
                                </div>
                            @else
                                <img src="{{ asset('storage/' . $article->owner->avatar) }}" class="avatar"
                                    alt="{{ $article->owner->uname }}">
                            @endif
                            <button type="button" class="text-muted" data-bs-toggle="modal"
                                data-bs-target="#userModal">
                                @lang('index.sections.By')
                                {{ $article->owner->fname . ' ' . $article->owner->lname }}
                            </button>
                        </div>

                        <div class="post__reactions">
                            <button class="like">
                                <span class="muted-color">{{ $article->likes_count }}</span>
                            </button>
                            <button class="dislike">
                                <span class="muted-color">{{ $article->dislikes_count }}</span>
                            </button>
                        </div>
                    </footer>
                </div>
            </article>
        @empty
            <div class="d-flex flex-column align-items-center">
                <span class="fs-3">@lang('index.sections.Empty line one')</span>
                <span class="fs-4">@lang('index.sections.Empty line two')</span>
            </div>
        @endforelse
    </div>

    <div class="user__modal">
        <x-modal>
            <x-slot:id>userModal</x-slot:id>
            <x-slot:title></x-slot:title>
            <x-slot:body>
                <form>
                    UNDER DEVELOPMENT
                    <x-slot:button>
                        <button wire:click="resetFields" type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">@lang('dashboard.modal.Close')
                        </button>
                    </x-slot:button>
                </form>
            </x-slot:body>
        </x-modal>
    </div>
</section>
