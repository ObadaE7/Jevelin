@section('breadcrumb')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('user.profile') }}">{{ trans('string.Profile') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a>{{ trans('string.My Profile') }}</a></li>
    </x-breadcrumb>
@endsection

<div>
    <x-alert status="success" color="success" />
    <x-alert status="error" color="danger" />

    <section class="profile__wrapper">
        <div class="profile__right">
            @include('admin.pages.partials.personal-info')
            @include('admin.pages.partials.about-me')
            @include('admin.pages.partials.change-email')
            @include('admin.pages.partials.change-password')
        </div>

        <div class="profile__left">
            <div class="profile__banner">
                <div class="profile__header">
                    @include('admin.pages.partials.change-cover')
                    @include('admin.pages.partials.change-avatar')
                </div>

                <div class="profile__info">
                    <span>{{ $fname . ' ' . $lname }}</span>
                    <div class="d-flex align-items-center gap-1 text-muted">
                        <span class="material-icons-outlined fs-6">alternate_email</span>
                        <span>{{ $uname }}</span>
                    </div>
                </div>
            </div>

            <div class="profile__account">
                <div class="d-flex flex-column">
                    <label for="delete-account-btn">{{ trans('dashboard.profile.Delete account') }}</label>
                    <small class="text-muted">{{ trans('dashboard.profile.Delete account warning') }}</small>
                </div>
                <button id="delete-account-btn" class="btn bg-danger-subtle text-danger fw-bold" data-bs-toggle="modal"
                    data-bs-target="#deleteModal">
                    {{ trans('dashboard.profile.Delete my account') }}
                </button>
                @include('admin.pages.partials.delete-account')
            </div>
        </div>
    </section>
</div>

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
