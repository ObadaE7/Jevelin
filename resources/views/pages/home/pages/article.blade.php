<section class="wrapper">
    @livewire('home.header')

    <main class="pages__wrapper">
        <div class="pages__header">
            <div class="d-flex align-items-center gap-2">
                <span class="material-icons-outlined">feed</span>
                <span class="fs-4">{{ $article->title }}</span>
            </div>
            <span class="text-muted">{{ $article->subtitle }}</span>
        </div>

        <div class="pages__main article">
            <div class="card">
                <div class="card-body">
                    <div class="flash-animation float-md-end float-none">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->slug }}">
                    </div>

                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div class="d-flex">
                            <img src="{{ asset('storage/' . $article->owner->avatar) }}" class="avatar"
                                alt="{{ $article->slug }}">
                            <div class="d-flex flex-column">
                                <span>{{ $article->owner->fname . ' ' . $article->owner->lname }}</span>
                                <small class="text-muted">
                                    @if ($article->owner->role_id)
                                        {{ App\Models\Role::where('id', $article->owner->role_id)->first()->name }}
                                    @else
                                        <span style="font-size: 12px">(@lang('index.pages.Role'))</span>
                                    @endif
                                </small>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-2 text-muted">
                            <span>{{ $article->getDateForHuman() }}</span>
                            <span class="material-icons-outlined">calendar_month</span>
                        </div>
                    </div>
                    <p>{{ $article->content }}</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="comment__wrapper">
                    <span class="fs-4">@lang('index.pages.Comments')</span>
                    <livewire:comments :article="$article" />
                </div>
            </div>
        </div>
    </main>
    @livewire('home.footer')
</section>
