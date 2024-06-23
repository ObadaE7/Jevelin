<section class="main__best-user">
    <div class="main__section-header">
        <span class="section__title">{!! trans('index.sections.Our best writer') !!}</span>
    </div>

    <div class="best__user-content">
        <div class="avatar-confetti">
            <img src="{{ asset('assets/img/others/avatar.jpg') }}" class="avatar" alt="">
        </div>
        <span class="fs-4">عبادة دراغمة</span>
        <span class="best__user-quote">{{ trans('index.sections.Best user quote') }}</span>
        <span class="material-icons-outlined muted-color">format_quote</span>
        <div class="more__user"><a href="#">{{ trans('index.sections.More writers') }}</a></div>
    </div>
</section>

@push('scripts')
    <script src="{{ asset('assets/lib/confetti/confetti.js') }}"></script>
    <script>
        document.querySelector(".avatar-confetti").addEventListener("click", () => {
            confetti();
        });
    </script>
@endpush
