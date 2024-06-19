@section('breadcrumb')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.profile') }}">{{ trans('string.Profile') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a>{{ trans('string.My Profile') }}</a></li>
    </x-breadcrumb>
@endsection

<section class="profile__wrapper">
    <div class="profile__left">
        <div class="profile__header">
            @include('admin.pages.partials.change-cover')
            @include('admin.pages.partials.change-avatar')
        </div>

        <div class="profile__info">
            <span class="profile__info-name">{{ $fname . ' ' . $lname }}</span>
        </div>
    </div>

    <div class="profile__right">
        @include('admin.pages.partials.personal-info')
        @include('admin.pages.partials.about-me')
        @include('admin.pages.partials.change-email')
        @include('admin.pages.partials.change-password')
    </div>
</section>

@push('scripts')
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    <script>
        togglePassword();
        toolTip();

        document.addEventListener('livewire:navigated', () => {
            Livewire.on('resetSuccessMessage', (field) => {
                setTimeout(() => {
                    @this.resetSuccessMessage(field);
                }, 3000);
            })
        });
    </script>
@endpush
