<aside class="aside__wrapper">
    <div class="aside__brand">
        <span class="menu__icon dashboard"></span>
        <span class="menu__text">{{ trans('string.Dashboard') }}</span>
    </div>

    <div class="aside__menu">
        <ul class="aside__menu-ul">
            <li>
                <a href="{{ route('dashboard.profile') }}" class="{{ Route::is('dashboard.profile') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon profile"></span>
                        <span class="menu__text">{{ trans('string.Profile') }}</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('dashboard.analysis') }}"
                    class="{{ Route::is('dashboard.analysis') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon analysis"></span>
                        <span class="menu__text">{{ trans('string.Analysis') }}</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('dashboard.posts') }}" class="{{ Route::is('dashboard.posts') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon posts"></span>
                        <span class="menu__text">{{ trans('string.Articles') }}</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('dashboard.create.post') }}"
                    class="{{ Route::is('dashboard.create.post') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon create"></span>
                        <span class="menu__text">{{ trans('string.Create') }}</span>
                    </div>
                </a>
            </li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-100">
                        <div class="icon__container">
                            <span class="menu__icon log-out"></span>
                            <span class="menu__text">{{ trans('string.Logout') }}</span>
                        </div>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
