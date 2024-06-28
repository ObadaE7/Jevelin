<div class="filter__search">
    <button class="btn__search" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
    <input wire:model.live='search' type="search" class="form-control input__search" placeholder="@lang('dashboard.table.Search here')">
    <ul class="dropdown-menu dropdown-menu-start text-end">
        <li>
            <div class="dropdown-item"><span class="text-muted">@lang('dashboard.table.Search by')</span></div>
        </li>
        @foreach ($columns as $column)
            @unless ($column == 'image' || $column == 'flag' || $column == 'posts_count' )
                <li>
                    <button wire:click="$set('searchBy', '{{ $column }}')"
                        class="dropdown-item {{ $searchBy == $column ? 'active' : '' }}">
                        @lang('dashboard.table.' . ucfirst($column))
                    </button>
                </li>
            @endunless
        @endforeach
    </ul>
</div>

<div class="filter__per-page">
    <select wire:model.live='perPage' class="form-select">
        <option value="" selected>@lang('dashboard.table.Per page')</option>
        @foreach ($perPages as $item)
            <option value="{{ $item }}">{{ $item }}</option>
        @endforeach
    </select>
</div>

<div class="filter__options">
    <div class="dropdown ">
        <button class="btn__options text-end" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">@lang('dashboard.table.Options')</button>
        <ul class="dropdown-menu dropdown-menu-start text-end">
            @if ($optCreate)
                <li>
                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createModal">
                        <div class="d-flex align-items-center gap-2">
                            <span class="material-icons-outlined text-muted">add</span>
                            <span>@lang('dashboard.table.Create')</span>
                        </div>
                    </button>
                </li>
            @endif
            <li>
                <button wire:click='$refresh' class="dropdown-item">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined text-muted fs-5">refresh</span>
                        <span>@lang('dashboard.table.Refresh')</span>
                    </div>
                </button>
            </li>
            <li>
                <button wire:click='resetFilters' class="dropdown-item">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined text-muted fs-5">youtube_searched_for</span>
                        <span>@lang('dashboard.table.Reset')</span>
                    </div>
                </button>
            </li>
            <li>
                <div class="dropdown-divider"></div>
                <div class="dropdown-item-text">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined text-muted fs-5">file_download</span>
                        <small class="text-muted">@lang('dashboard.table.Export')</small>
                    </div>
                </div>
            </li>
            <li>
                <button class="dropdown-item" disabled>
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined text-muted fs-5">description</span>
                        <span>@lang('dashboard.table.Pdf')</span>
                    </div>
                </button>
            </li>
            <li>
                <button class="dropdown-item" disabled>
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined text-muted fs-5">description</span>
                        <span>@lang('dashboard.table.Excel')</span>
                    </div>
                </button>
            </li>
            <li>
                <button class="dropdown-item" disabled>
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined text-muted fs-5">description</span>
                        <span>@lang('dashboard.table.Csv')</span>
                    </div>
                </button>
            </li>
            <li>
                <button class="dropdown-item" disabled>
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined text-muted fs-5">print</span>
                        <span>@lang('dashboard.table.Print')</span>
                    </div>
                </button>
            </li>
        </ul>
    </div>
</div>
