<section class="wrapper">
    @include('includes.index.header')
    <main class="wrapper__main">
        @include('includes.index.hero')
        @include('includes.index.section-one')
        @include('includes.index.subscribe')
        @include('includes.index.section-two')
        @include('includes.index.our-best-user')
        <div class="three__waves-up">
            <img src="{{ asset('assets/img/svg/two-wave-up.svg') }}" alt="{{ trans('index.sections.Wave background') }}">
        </div>
        @livewire('home.articles-by-category')
        <div class="three__waves-down">
            <img src="{{ asset('assets/img/svg/three-wave-down.svg') }}"
                alt="{{ trans('index.sections.Wave background') }}">
        </div>
    </main>
    <footer class="wrapper__footer"></footer>
</section>
