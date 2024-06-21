<x-guest-layout>
    <section class="auth__wrapper">
        <div class="auth__wrapper-main">
            <span class="fs-4">{{ trans('string.Create A New Password') }}</span>
            <x-alert status="error" color="danger" />

            <div class="auth__wrapper-form mt-3">
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="mb-3">
                        <label for="email">{{ trans('string.E-mail') }}</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="{{ trans('string.Enter your email address') }}"
                            value="{{ old('email', $request->email) }}" required autofocus>
                        <x-error name="email" />
                    </div>

                    <div class="mb-3">
                        <label for="password">{{ trans('string.Password') }}</label>
                        <div class="input-password">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="{{ trans('string.Enter the password') }}">
                            <span class="material-icons-outlined input-password-icon">visibility</span>
                        </div>
                        <x-error name="password" />
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation">{{ trans('string.Confirm password') }}</label>
                        <div class="input-password">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="{{ trans('string.Retype the password') }}">
                            <span class="material-icons-outlined input-password-icon">visibility</span>
                        </div>
                        <x-error name="password_confirmation" />
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('login') }}" class="btn btn-secondary">{{ trans('string.Cancel') }}</a>
                        <button type="submit" class="btn btn-primary">{{ trans('string.Reset password') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script>
            togglePassword();
        </script>
    @endpush
</x-guest-layout>
