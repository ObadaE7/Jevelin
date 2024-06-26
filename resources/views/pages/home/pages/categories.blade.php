<section class="wrapper">
    @livewire('home.header')

    <main class="pages__wrapper">
        <div class="pages__header">
            <div class="d-flex align-items-center gap-2">
                <span class="material-icons-outlined">category</span>
                <span class="fs-4">@lang('index.pages.Categories')</span>
            </div>
            <span class="text-muted">@lang('index.pages.Category placeholder')</span>
        </div>

        <div class="pages__main categories">
            @forelse ($categories as $category)
                <div class="card">
                    <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top"
                        alt="{{ $category->slug }}">
                    <div class="card-body">
                        <div class="d-flex flex-column gap-3 h-100">
                            <span class="fs-5">{{ $category->name }}</span>
                            <small class="text-muted">{{ $category->description }}</small>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <a href="{{ route('articles.category', $category->slug) }}" class="btn">
                                    @lang('index.pages.View articles')
                                </a>
                                <span class="categories__badge">{{ $category->posts_count }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                @lang('index.pages.Empty category')
            @endforelse
        </div>

        @if ($categories->total() > 4)
            <div class="pages__paginate">{{ $categories->links() }}</div>
        @endif
    </main>

    @livewire('home.footer')
</section>
