<div class="filter__search">
    <button class="btn__search" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
    <input wire:model.live='search' type="search" class="form-control input__search" placeholder="ابحث هنا">
    <ul class="dropdown-menu dropdown-menu-start text-end">
        <li>
            <div class="dropdown-item"><span class="text-muted">البحث عن طريق</span></div>
        </li>
        @foreach ($columns as $column)
            <li>
                <button wire:click.live="$set('searchBy', '{{ $column }}')"
                    class="dropdown-item {{ $searchBy == $column ? 'active' : '' }}">
                    {{ $column }}
                </button>
            </li>
        @endforeach
    </ul>
</div>

<div class="filter__per-page">
    <select wire:model.live='perPage' class="form-select">
        <option disabled>لكل صفحة</option>
        @foreach ($perPages as $item)
            <option value="{{ $item }}">{{ $item }}</option>
        @endforeach
    </select>
</div>

<div class="filter__options">
    <div class="dropdown ">
        <button class="btn__options text-end" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">الخيارات</button>
        <ul class="dropdown-menu dropdown-menu-start text-end">
            @if ($optCreate)
                <li>
                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createModal">
                        <div class="d-flex align-items-center gap-2">
                            <span class="material-icons-outlined text-muted">add</span>
                            <span>إضافة</span>
                        </div>
                    </button>
                </li>
            @endif
            <li>
                <button wire:click='$refresh' class="dropdown-item">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined text-muted">refresh</span>
                        <span>تحديث</span>
                    </div>
                </button>
            </li>
            <li>
                <button wire:click='resetFilters' class="dropdown-item">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined text-muted">youtube_searched_for</span>
                        <span>إعادة ضبط</span>
                    </div>
                </button>
            </li>
            <li>
                <div class="dropdown-divider"></div>
                <div class="dropdown-item-text">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined text-muted">file_download</span>
                        <small class="text-muted">تصدير</small>
                    </div>
                </div>
            </li>
            <li>
                <button class="dropdown-item">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined text-muted">description</span>
                        <span>بي دي إف</span>
                    </div>
                </button>
            </li>
            <li>
                <button class="dropdown-item">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined text-muted">description</span>
                        <span>اكسل</span>
                    </div>
                </button>
            </li>
            <li>
                <button class="dropdown-item">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined text-muted">description</span>
                        <span>سي اس في</span>
                    </div>
                </button>
            </li>
            <li>
                <button class="dropdown-item">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined text-muted">print</span>
                        <span>طباعة</span>
                    </div>
                </button>
            </li>
        </ul>
    </div>
</div>
