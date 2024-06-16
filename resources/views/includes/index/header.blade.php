<header class="wrapper__header">
    <div class="wrapper__header-brand">
        <img src="{{ asset('assets/img/logo/jeveline-logo-dark-v1.png') }}" class="header__brand" alt="لوجو الموقع">
    </div>

    <div class="wrapper__header-menu">
        <ul class="header__menu">
            <li>
                <a href="{{ route('index') }}" class="{{ Route::is('index') ? 'active' : '' }}">
                    {{ trans('string.Homepage') }}
                </a>
            </li>
            <li>
                <a href="" class="{{ Route::is('categories') ? 'active' : '' }}">
                    {{ trans('string.Categories') }}
                </a>
            </li>
            <li>
                <a href="" class="{{ Route::is('articles') ? 'active' : '' }}">
                    {{ trans('string.Articles') }}
                </a>
            </li>
            @auth
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard') ? 'active' : '' }}">
                        {{ trans('string.Dashboard') }}
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" class="{{ Route::is('login') ? 'active' : '' }}">
                        {{ trans('string.Login') }}
                    </a>
                </li>
            @endauth
        </ul>
    </div>

    <div class="wrapper__header-settings">
        <div class="header__lang">
            <span class="material-icons-outlined">public</span>
            <button>عربي</button>
        </div>

        <div class="header__theme">
            <span class="material-icons-outlined">contrast</span>
            <button>فاتح</button>
        </div>
    </div>
</header>
