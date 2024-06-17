<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route(Request::is('admin/*') ? 'admin.dashboard' : 'user.dashboard') }}">
                {{ trans('string.Dashboard') }}
            </a>
        </li>
        {{ $slot }}
    </ol>
</nav>
