<aside class="aside__wrapper">
    <ul class="aside__ul">
        <li>
            <a href="{{ route('user.profile') }}" class="{{ Route::is('user.profile') ? 'active' : '' }}">
                <div class="li__item">
                    <span class="li__icon profile"></span>
                    <span class="li__text">{{ trans('dashboard.aside.Profile') }}</span>
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('index') }}"">
                <div class="li__item">
                    <span class="li__icon main"></span>
                    <span class="li__text">{{ trans('dashboard.aside.Main') }}</span>
                </div>
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-100">
                    <div class="li__item">
                        <span class="li__icon log-out"></span>
                        <span class="li__text">{{ trans('dashboard.aside.Logout') }}</span>
                    </div>
                </button>
            </form>
        </li>
        <li>
            <small class="li__item-split text-muted">{{ trans('dashboard.aside.Articles section') }}</small>
        </li>
        <li>
            <a href="{{ route('user.analysis') }}" class="{{ Route::is('user.analysis') ? 'active' : '' }}">
                <div class="li__item">
                    <span class="li__icon analysis"></span>
                    <span class="li__text">{{ trans('dashboard.aside.Analysis') }}</span>
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user.posts') }}" class="{{ Route::is('user.posts') ? 'active' : '' }}">
                <div class="li__item">
                    <span class="li__icon posts"></span>
                    <span class="li__text">{{ trans('dashboard.aside.Articles') }}</span>
                </div>
            </a>
        </li>
        <li class="mt-0">
            <a href="{{ route('user.create.post') }}" class="{{ Route::is('user.create.post') ? 'active' : '' }}">
                <div class="li__item">
                    <span class="li__icon create"></span>
                    <span class="li__text">{{ trans('dashboard.aside.Create') }}</span>
                </div>
            </a>
        </li>
    </ul>
</aside>
