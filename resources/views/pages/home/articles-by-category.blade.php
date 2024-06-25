<section class="main__section-three">
    <div class="main__section-header">
        <span class="section__title">@lang('index.sections.Section three title')</span>
        <span class="section__subtitle">@lang('index.sections.Section three subtitle')</span>
    </div>

    <div class="section__three-content">
        <div class="section__three-right">
            <div class="nav flex-column gap-2 nav-pills p-0" id="pills-tab" role="tablist" aria-orientation="vertical">
                <input wire:model.live='categorySearch' type="search" class="form-control"
                    placeholder="@lang('index.sections.Search placeholder')">

                @forelse ($articlesByCategory as $category)
                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="pills-{{ $category->id }}-tab"
                        data-bs-toggle="pill" href="#pills-{{ $category->id }}" role="tab"
                        aria-controls="pills-{{ $category->id }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                        <div class="d-flex justify-content-between">
                            <span>{{ $category->name }}</span>
                            <span class="nav__link-badge">{{ $category->posts->count() }}</span>
                        </div>
                    </a>
                @empty
                    <a class="nav-link text-bg-danger">
                        <div class="d-flex justify-content-between">
                            <span>@lang('index.sections.Category not exist')</span>
                        </div>
                    </a>
                @endforelse
                <a href="{{ route('categories') }}" class="nav-link" id="pills-settings-tab" data-bs-toggle="pill"
                    href="#pills-settings" role="tab" aria-controls="pills-settings" aria-selected="false">
                    <div class="d-flex justify-content-between">
                        <span>@lang('index.sections.View all')</span>
                        <span class="nav__link-badge">{{ $totalCategories }}</span>
                    </div>
                </a>
            </div>
        </div>

        @foreach ($articlesByCategory as $category)
            <div class="section__three-left tab-content" id="tabContent">
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="pills-{{ $category->id }}"
                    role="tabpanel" aria-labelledby="pills-{{ $category->id }}-tab">
                    @forelse ($category->posts as $post)
                        <div class="post__category">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->slug }}">
                            <div class="overlay-text"></div>
                            <div class="post__category-title">
                                <span>{{ $post->title }}</span>
                            </div>
                            <div class="post__category-link">
                                <a href="{{ route('article', $post->slug) }}" class="text-white">
                                    @lang('index.sections.View article')
                                </a>
                            </div>
                        </div>
                    @empty
                        <span class="text-muted">@lang('index.sections.Empty articles')</span>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>
</section>
