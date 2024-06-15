<x-guest-layout>
    <section class="wrapper">
        @include('includes.index.header')

        <main class="wrapper__main">
            @include('includes.index.hero')
            @include('includes.index.section-one')


            <section class="main__section-two">
                <div class="main__section-header">
                    <span class="section__title">مقالات جديدة لا تفوتها</span>
                    <span class="section__subtitle">
                        استكشف ما لدينا من مقالات جديدة ومميزة، وتعرف على أحدث الأفكار
                        والمعلومات التي قد تثري حياتك وتفتح أفق جديد لفهم العالم من حولك
                    </span>
                </div>
            </section>


            <section class="main__section-three">
                <div class="main__section-header">
                    <span class="section__title">مقالات جديدة لا تفوتها</span>
                    <span class="section__subtitle">استكشف ما لدينا من مقالات جديدة ومميزة، وتعرف على أحدث الأفكار
                        والمعلومات التي قد تثري حياتك وتفتح أفق جديد لفهم العالم من حولك</span>
                </div>
            </section>

        </main>

        <footer class="wrapper__footer"></footer>
    </section>
</x-guest-layout>
