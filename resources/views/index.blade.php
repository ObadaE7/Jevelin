<x-guest-layout>
    <section class="wrapper">
        <header class="wrapper__header">
            <div class="wrapper__header-brand">
                <img src="{{ asset('assets/img/logo/jeveline-logo-dark-v1.png') }}" class="header__brand"
                    alt="لوجو الموقع">
            </div>

            <div class="wrapper__header-menu">
                <ul class="header__menu">
                    <li><a href="{{ route('index') }}">{{ trans('string.Homepage') }}</a></li>
                    <li><a href="">{{ trans('string.Categories') }}</a></li>
                    <li><a href="">{{ trans('string.Posts') }}</a></li>
                    @auth
                        <li>
                            <a href="{{ route('dashboard') }}">{{ trans('string.Dashboard') }}
                            </a>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">{{ trans('string.Login') }}</a></li>
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

        <main class="wrapper__main">
            <section class="main__hero">
                <img src="{{ asset('assets/img/others/hero.png') }}" alt="Hero image">
                <div class="main__hero-overlay"></div>
                <div class="main__hero-text">
                    <span class="main__hero-title">{{ trans('string.Hero title') }}</span>
                    <span class="main__hero-subtitle">{{ trans('string.Hero subtitle') }}</span>
                    <a href="#explore" class="main__hero-button">{{ trans('string.Explore Posts') }}</a>
                </div>
            </section>


            <section class="main__posts" id="explore">
                sdfsd
            </section>
        </main>

        <footer class="wrapper__footer"></footer>
    </section>
</x-guest-layout>
