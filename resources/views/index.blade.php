<x-guest-layout>
    <section class="wrapper">
        @include('includes.index.header')
        <main class="wrapper__main">
            @include('includes.index.hero')
            @include('includes.index.section-one')
            @include('includes.index.subscribe')
            @include('includes.index.section-two')
            @include('includes.index.our-best-user')
            {{--
            @include('includes.index.section-three') --}}
        </main>
        <footer class="wrapper__footer"></footer>
    </section>
</x-guest-layout>
