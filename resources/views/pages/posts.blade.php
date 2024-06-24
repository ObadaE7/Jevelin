@section('breadcrumb')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('user.posts') }}">{{ trans('dashboard.post.Articles') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a>{{ trans('dashboard.post.Show') }}</a></li>
    </x-breadcrumb>
@endsection

<section class="articles__wrapper">
    <div class="articles__filters">
        <div class="filter__search">
            <button class="btn__search" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
            <input wire:model.live='search' type="search" class="form-control input__search"
                placeholder="{{ trans('dashboard.post.Search here') }}">
            <ul class="dropdown-menu dropdown-menu-start text-end">
                <li>
                    <div class="dropdown-item">
                        <span class="text-muted">{{ trans('dashboard.post.Search by') }}</span>
                    </div>
                </li>
                @foreach ($columns as $column)
                    <li>
                        <button wire:click="$set('searchBy', '{{ $column }}')"
                            class="dropdown-item {{ $searchBy == $column ? 'active' : '' }}">
                            {{ trans('dashboard.post.' . ucfirst($column)) }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="filter__per-page">
            <select wire:model.live='perPage' class="form-select">
                <option disabled>{{ trans('dashboard.post.Per page') }}</option>
                @foreach ($perPages as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>

        <div class="filter__order-by">
            <button wire:click="$set('orderDir','desc')"
                class="btn {{ $orderDir == 'desc' ? 'btn-primary' : '' }} fw-bold">
                <div class="d-flex align-items-center gap-2">
                    <span class="material-icons-outlined">sort</span>
                    <span>{{ trans('dashboard.post.Newest') }}</span>
                </div>
            </button>

            <button wire:click="$set('orderDir','asc')"
                class="btn {{ $orderDir == 'asc' ? 'btn-primary' : '' }} fw-bold">
                <div class="d-flex align-items-center gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined">sort</span>
                        <span>{{ trans('dashboard.post.Oldest') }}</span>
                    </div>
                </div>
            </button>
        </div>
    </div>

    <div class="articles__content">
        @forelse ($articles  as $article)
            <div class="articles__row-post">
                <div class="articles__img">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->slug }}">
                </div>

                <div class="articles__info">
                    <div class="d-flex flex-column">
                        <span>{{ $article->title }}</span>
                        <small class="text-muted ">{{ $article->subtitle }}</small>
                    </div>
                    <small class="articles__info-content">{{ $article->content }}</small>
                </div>

                <div class="articles__settings">
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">{{ trans('dashboard.post.Quick peek') }}</small>
                        <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="material-icons-outlined">settings</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end text-end">
                            <li><a class="dropdown-item" href="#">{{ trans('dashboard.post.Edit') }}</a></li>
                            <li><a class="dropdown-item" href="#">{{ trans('dashboard.post.Delete') }}</a></li>
                        </ul>
                    </div>

                    <div class="d-flex flex-column gap-3">
                        @php
                            $totalReactions = $article->likes_count + $article->dislikes_count;
                            $likes_percentage = ($article->likes_count / $totalReactions) * 100;
                            $dislikes_percentage = ($article->dislikes_count / $totalReactions) * 100;
                        @endphp

                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <span class="material-icons-outlined text-primary">thumb_up</span>
                                <span>{{ $article->likes_count }}</span>
                            </div>
                            <div class="d-flex align-items-center gap-1 text-success">
                                <span class="material-icons-outlined">donut_small</span>
                                <span>{{ round($likes_percentage, 2) }}%</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <span class="material-icons-outlined text-danger">thumb_down</span>
                                <span>{{ $article->dislikes_count }}</span>
                            </div>
                            <div class="d-flex align-items-center gap-1 text-danger">
                                <span class="material-icons-outlined">donut_small</span>
                                <span>{{ round($dislikes_percentage, 2) }}%</span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column text-muted">
                        <span>{{ trans('dashboard.post.Created at') }} {{ $article->getDateForHuman() }}</span>
                        <small>{{ $article->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        @empty
            <div class="articles__row-post">
                <div class="d-flex flex-column align-items-center">
                    <span class="text-nowrap">{{ trans('index.sections.Empty line one') }}</span>
                    <span class="">{{ trans('index.sections.Empty line two') }}</span>
                </div>
            </div>
        @endforelse

        @if ($articles->count() > 5)
            <div class="paginate__section">{{ $articles->links() }}</div>
        @endif
    </div>
</section>
