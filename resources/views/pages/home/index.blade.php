<section class="wrapper">
    @livewire('home.header')
    <main class="wrapper__main">
        @include('pages.home.hero')

        <section class="one__waves-up">
            <img src="{{ asset('assets/img/svg/one-wave-up.svg') }}" alt="{{ trans('index.sections.Wave background') }}">
        </section>

        @livewire('home.latest-articles')

        <section class="one__waves-down">
            <img src="{{ asset('assets/img/svg/one-wave-down.svg') }}"
                alt="{{ trans('index.sections.Wave background') }}">
        </section>

        @livewire('home.subscribe')

        <div class="two__waves-up">
            <img src="{{ asset('assets/img/svg/two-wave-up.svg') }}" alt="{{ trans('index.sections.Wave background') }}">
        </div>

        @livewire('home.top-articles')

        <div class="two__waves-down">
            <img src="{{ asset('assets/img/svg/two-wave-down.svg') }}"
                alt="{{ trans('index.sections.Wave background') }}">
        </div>

        @livewire('home.best-writer')

        <div class="three__waves-up">
            <img src="{{ asset('assets/img/svg/two-wave-up.svg') }}"
                alt="{{ trans('index.sections.Wave background') }}">
        </div>

        @livewire('home.articles-by-category')

        <div class="three__waves-down">
            <img src="{{ asset('assets/img/svg/three-wave-down.svg') }}"
                alt="{{ trans('index.sections.Wave background') }}">
        </div>
    </main>
    @livewire('home.footer')
</section>
