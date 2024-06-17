<aside class="aside__wrapper">
    <div class="aside__brand">
        <span class="menu__icon dashboard"></span>
        <span class="menu__text">{{ trans('string.Dashboard') }}</span>
    </div>

    <div class="aside__menu">
        <ul class="aside__menu-ul">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon main"></span>
                        <span class="menu__text">{{ trans('string.Main') }}</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.profile') }}" class="{{ Route::is('admin.profile') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon profile"></span>
                        <span class="menu__text">{{ trans('string.Profile') }}</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.settings') }}" class="{{ Route::is('admin.settings') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon settings"></span>
                        <span class="menu__text">{{ trans('string.Settings') }}</span>
                    </div>
                </a>
            </li>

            <li>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-100">
                        <div class="icon__container">
                            <span class="menu__icon log-out"></span>
                            <span class="menu__text">{{ trans('string.Logout') }}</span>
                        </div>
                    </button>
                </form>
            </li>

            <li>
                <small class="text-muted">{{ trans('string.Basic tables') }}</small>
            </li>

            <li>
                <a href="{{ route('admin.roles') }}" class="{{ Route::is('admin.roles') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon role"></span>
                        <span class="menu__text">{{ trans('string.Roles') }}</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.countries') }}" class="{{ Route::is('admin.countries') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon country"></span>
                        <span class="menu__text">{{ trans('string.Countries') }}</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.categories') }}" class="{{ Route::is('admin.categories') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon categories"></span>
                        <span class="menu__text">{{ trans('string.Categories') }}</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.tags') }}" class="{{ Route::is('admin.tags') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon tags"></span>
                        <span class="menu__text">{{ trans('string.Tags') }}</span>
                    </div>
                </a>
            </li>

            <li>
                <small class="text-muted">{{ trans('string.Secondary tables') }}</small>
            </li>

            <li>
                <a href="{{ route('admin.users') }}" class="{{ Route::is('admin.users') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon user"></span>
                        <span class="menu__text">{{ trans('string.Users') }}</span>
                    </div>
                </a>
            </li>

            <li class="mt-0">
                <a href="{{ route('admin.posts') }}" class="{{ Route::is('admin.posts') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon posts"></span>
                        <span class="menu__text">{{ trans('string.Articles') }}</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</aside>
