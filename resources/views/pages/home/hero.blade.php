<section class="main__hero">
    <img src="{{ asset('assets/img/others/hero.jpg') }}" alt="{{ trans('index.hero.Hero bg') }}">
    <div class="main__hero-overlay"></div>
    <div class="main__hero-text">
        <span class="main__hero-title">@lang('index.hero.Hero title') {{ config('app.name') }}</span>
        <span class="main__hero-subtitle">@lang('index.hero.Hero subtitle')</span>
        <a href="#explore" class="main__hero-button">@lang('index.hero.Explore Articles')</a>
    </div>
</section>
