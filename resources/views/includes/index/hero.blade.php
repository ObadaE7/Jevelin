<section class="main__hero">
    <img src="{{ asset('assets/img/others/hero.jpg') }}" alt="{{ trans('index.hero.Hero bg') }}">
    <div class="main__hero-overlay"></div>
    <div class="main__hero-text">
        <span class="main__hero-title">{{ trans('index.hero.Hero title') . config('app.name') }}</span>
        <span class="main__hero-subtitle">{{ trans('index.hero.Hero subtitle') }}</span>
        <a href="#explore" class="main__hero-button">{{ trans('index.hero.Explore Articles') }}</a>
    </div>
</section>
