<header class="dashboard__header">
    <div class="header__brand">
        <span class="li__icon dashboard"></span>
        <span class="li__text">{{ trans('string.Dashboard') }}</span>
    </div>

    <div class="header__toggle" onclick="toggleSidebar()">
        <button><span class="material-icons-outlined">menu</span></button>
    </div>

    <div class="header__menu">
        <ul class="header__ul">
            <li>
                <div class="dropdown">
                    <button class="li__btn language" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false"></button>
                    <ul class="dropdown-menu dropdown-menu-end text-end">
                        <li><a class="dropdown-item" href="#">Arabic</a></li>
                        <li><a class="dropdown-item" href="#">English</a></li>
                    </ul>
                </div>
            </li>
            <li>
                @livewire('user.header-notification')
            </li>
            <li>
                <div class="dropdown">
                    <button class="li__btn messages" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false"></button>
                    <span class="li__btn-badge messages">0</span>
                    <ul class="dropdown-menu dropdown-menu-end text-end drop-msg">
                        <li>
                            <span class="dropdown-item text-center">{{ trans('dashboard.aside.All Messages') }}</span>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="dropdown">
                    <button class="li__btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="avatar" alt="{{ trans('Profile avatar') }}"
                            src="{{ isset(auth()->user()->avatar) ? asset('storage/' . auth()->user()->avatar) : asset('assets/img/others/avatar.jpg') }}">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end text-end">
                        <li><a class="dropdown-item" href="#">{{ trans('dashboard.aside.Profile') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ trans('dashboard.aside.Settings') }}</a></li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="dropdown-item">{{ trans('dashboard.aside.Logout') }}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</header>
