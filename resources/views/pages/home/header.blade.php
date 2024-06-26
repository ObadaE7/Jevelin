<header class="wrapper__header">
    <div class="wrapper__header-brand">
        <div class="header__brand">
            <img src="{{ asset('assets/img/logo/jeveline-logo-dark-v1.png') }}" alt="logo">
        </div>
    </div>

    <div class="wrapper__header-menu">
        <ul class="header__menu">
            <li class="li__index">
                <a href="{{ route('index') }}" class="{{ Route::is('index') ? 'active' : '' }}">
                    @lang('index.header.Homepage')
                </a>
            </li>
            <li class="li__categories">
                <a href="{{ route('categories') }}" class="{{ Route::is('categories') ? 'active' : '' }}">
                    @lang('index.header.Categories')
                </a>
            </li>
            <li class="li__articles">
                <a href="{{ route('articles') }}" class="{{ Route::is('articles') ? 'active' : '' }}">
                    @lang('index.header.Articles')
                </a>
            </li>
            @auth
                <li class="li__dashboard">
                    <a href="{{ route('user.profile') }}" class="{{ Route::is('user.profile') ? 'active' : '' }}">
                        @lang('index.header.Profile')
                    </a>
                </li>
            @else
                <li class="li__login">
                    <a href="{{ route('login') }}" class="{{ Route::is('login') ? 'active' : '' }}">
                        @lang('index.header.Login')
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
                <h5 class="offcanvas-title" id="headerToggleLabel">@lang('index.header.Header menu')</h5>
                <button type="button" class="btn-close m-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="offcanvas__menu">
                    <li class="li__index">
                        <a href="{{ route('index') }}" class="{{ Route::is('index') ? 'active' : '' }}">
                            @lang('index.header.Homepage')
                        </a>
                    </li>
                    <li class="li__categories">
                        <a href="{{ route('categories') }}" class="{{ Route::is('categories') ? 'active' : '' }}">
                            @lang('index.header.Categories')
                        </a>
                    </li>
                    <li class="li__articles">
                        <a href="{{ route('articles') }}" class="{{ Route::is('articles') ? 'active' : '' }}">
                            @lang('index.header.Articles')
                        </a>
                    </li>
                    @auth
                        <li class="li__dashboard">
                            <a href="{{ route('user.profile') }}"
                                class="{{ Route::is('user.profile') ? 'active' : '' }}">
                                @lang('index.header.Profile')
                            </a>
                        </li>
                    @else
                        <li class="li__login">
                            <a href="{{ route('login') }}" class="{{ Route::is('login') ? 'active' : '' }}">
                                @lang('index.header.Login')
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
