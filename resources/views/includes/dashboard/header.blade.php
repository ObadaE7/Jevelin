<header class="dashboard__header">
    <button class="aside__toggle" onclick="toggleSidebar()">
        <svg class="ham hamRotate ham8" viewBox="0 0 100 100" width="40" onclick="this.classList.toggle('active')">
            <path class="line top"
                d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20" />
            <path class="line middle" d="m 30,50 h 40" />
            <path class="line bottom"
                d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20" />
        </svg>
    </button>

    <div class="header__menu">
        <ul class="header__menu-ul">
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
                <div class="dropdown">
                    <button class="li__btn notifications" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false"></button>
                    <span class="li__btn-badge notifications">0</span>
                    <ul class="dropdown-menu dropdown-menu-end text-end drop-notify">
                        <li>
                            <span
                                class="dropdown-item text-center">{{ trans('dashboard.aside.ALL Notification') }}</span>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                    </ul>
                </div>
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
