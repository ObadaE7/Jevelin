<aside class="aside__wrapper">
    <div class="aside__brand">
        <span class="menu__icon dashboard"></span>
        <span class="menu__text">{{ trans('string.Dashboard') }}</span>
    </div>

    <div class="aside__menu">
        <ul class="aside__menu-ul">
            <li>
                <a href="{{ route('user.dashboard') }}" class="{{ Route::is('user.dashboard') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon main"></span>
                        <span class="menu__text">{{ trans('string.Main') }}</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('user.profile') }}" class="{{ Route::is('user.profile') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon profile"></span>
                        <span class="menu__text">{{ trans('string.Profile') }}</span>
                    </div>
                </a>
            </li>

            <li>
                <small class="text-muted">{{ trans('string.Articles section') }}</small>
            </li>

            <li>
                <a href="{{ route('user.analysis') }}" class="{{ Route::is('user.analysis') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon analysis"></span>
                        <span class="menu__text">{{ trans('string.Analysis') }}</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('user.posts') }}" class="{{ Route::is('user.posts') ? 'active' : '' }}">
                    <div class="icon__container">
                        <span class="menu__icon posts"></span>
                        <span class="menu__text">{{ trans('string.Articles') }}</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('user.create.post') }}" class="{{ Route::is('user.create.post') ? 'active' : '' }}">
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
