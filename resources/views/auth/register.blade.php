<x-guest-layout>
    <section class="auth__wrapper">
        <div class="auth__wrapper-main w-50">
            <span class="fs-4 mb-3">{{ trans('string.Create a new account') }}</span>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="auth__wrapper-form">
                    <div class="row row-cols-md-2 row-cols-1">
                        <div class="col">
                            <label for="fname">{{ trans('string.First name') }}</label>
                            <input type="text" name="fname" id="fname" class="form-control"
                                value="{{ old('fname') }}" placeholder="{{ trans('string.Enter your first name') }}"
                                autofocus>
                            <x-error name="fname" />
                        </div>

                        <div class="col">
                            <label for="lname">{{ trans('string.Last name') }}</label>
                            <input type="text" name="lname" id="lname" class="form-control"
                                value="{{ old('lname') }}" placeholder="{{ trans('string.Enter your last name') }}">
                            <x-error name="lname" />
                        </div>
                    </div>

                    <div>
                        <label for="uname">{{ trans('string.User name') }}</label>
                        <input type="text" name="uname" id="uname" class="form-control"
                            value="{{ old('uname') }}" placeholder="{{ trans('string.Enter your username') }}">
                        <x-error name="uname" />
                    </div>

                    <div>
                        <label for="email">{{ trans('string.E-mail') }}</label>
                        <input type="email" id="email" name="email" class="form-control"
                            value="{{ old('email') }}" placeholder="{{ trans('string.Enter your email address') }}"
                            required />
                        <x-error name="email" />
                    </div>

                    <div>
                        <label for="password">{{ trans('string.Password') }}</label>
                        <div class="input-password">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="{{ trans('string.Enter the password') }}" required />
                            <span class="material-icons-outlined input-password-icon">visibility</span>
                        </div>
                        <x-error name="password" />
                    </div>

                    <div>
                        <label for="password_confirmation">{{ trans('string.Confirm password') }}</label>
                        <div class="input-password">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="{{ trans('string.Retype the password') }}">
                            <span class="material-icons-outlined input-password-icon">visibility</span>
                        </div>
                        <x-error name="password_confirmation" />
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('index') }}" class="text-muted">{{ trans('string.Create Later') }}</a>
                        <button class="btn btn-primary w-25">{{ trans('string.Register') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script>
            togglePassword()
        </script>
    @endpush
</x-guest-layout>
