<header class="wrapper__header">
    <div class="wrapper__header-brand">
        <div class="header__brand">
            <a href="{{ route('index') }}">{{ config('app.name') }}</a>
        </div>
    </div>

    <div class="wrapper__header-menu">
        <ul class="header__menu">
            <li class="li__index">
                <a href="{{ route('index') }}" class="{{ Route::is('index') ? 'active' : '' }}">
                    {{ trans('index.header.Homepage') }}
                </a>
            </li>
            <li class="li__categories">
                <a href="" class="{{ Route::is('categories') ? 'active' : '' }}">
                    {{ trans('index.header.Categories') }}
                </a>
            </li>
            <li class="li__articles">
                <a href="" class="{{ Route::is('articles') ? 'active' : '' }}">
                    {{ trans('index.header.Articles') }}
                </a>
            </li>
            @auth
                <li class="li__dashboard">
                    <a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard') ? 'active' : '' }}">
                        {{ trans('index.header.Dashboard') }}
                    </a>
                </li>
            @else
                <li class="li__login">
                    <a href="{{ route('login') }}" class="{{ Route::is('login') ? 'active' : '' }}">
                        {{ trans('index.header.Login') }}
                    </a>
                </li>
            @endauth
        </ul>
    </div>

    <div class="wrapper__header-settings">
        <div class="header__lang">
            <span class="material-icons-outlined">public</span>
            <span>عربي</span>
        </div>

        <div class="header__theme">
            <span class="material-icons-outlined">contrast</span>
            <span>فاتح</span>
        </div>
    </div>

    <div class="wrapper__header-offcanvas">
        <button class="btn header__toggle-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#headerToggle"
            aria-controls="headerToggle">
        </button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="headerToggle" aria-labelledby="headerToggleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="headerToggleLabel">{{ trans('index.header.Header menu') }}</h5>
                <button type="button" class="btn-close m-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="offcanvas__menu">
                    <li class="li__index">
                        <a href="{{ route('index') }}" class="{{ Route::is('index') ? 'active' : '' }}">
                            {{ trans('index.header.Homepage') }}
                        </a>
                    </li>
                    <li class="li__categories">
                        <a href="" class="{{ Route::is('categories') ? 'active' : '' }}">
                            {{ trans('index.header.Categories') }}
                        </a>
                    </li>
                    <li class="li__articles">
                        <a href="" class="{{ Route::is('articles') ? 'active' : '' }}">
                            {{ trans('index.header.Articles') }}
                        </a>
                    </li>
                    @auth
                        <li class="li__dashboard">
                            <a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard') ? 'active' : '' }}">
                                {{ trans('index.header.Dashboard') }}
                            </a>
                        </li>
                    @else
                        <li class="li__login">
                            <a href="{{ route('login') }}" class="{{ Route::is('login') ? 'active' : '' }}">
                                {{ trans('index.header.Login') }}
                            </a>
                        </li>
                    @endauth
                    <li class="li__lang">
                        <span>عربي</span>
                    </li>

                    <li class="li__theme">
                        <span>فاتح</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
