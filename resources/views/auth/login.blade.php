<x-guest-layout>
    <section class="auth__wrapper">
        <div class="auth__wrapper-main">
            <span class="d-flex justify-content-center fs-4 mb-3">{{ trans('string.Login') }}</span>
            <x-alert status="success" color="success" />
            <x-alert status="error" color="danger" />

            <form method="POST" action="{{ route($routePrefix . 'login') }}">
                @csrf
                <div class="auth__wrapper-form">
                    <div>
                        <label for="email">{{ trans('string.E-mail') }}</label>
                        <input type="email" id="email" name="email" class="form-control"
                            value="{{ old('email') }}" placeholder="{{ trans('string.Enter your email address') }}"
                            required autofocus />
                    </div>

                    <div>
                        <label for="password">{{ trans('string.Password') }}</label>
                        <div class="input-password">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="{{ trans('string.Enter the password') }}" required />
                            <span class="material-icons-outlined input-password-icon">visibility</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <input id="remember" type="checkbox" class="form-check-input m-0" name="remember">
                            <label for="remember">{{ trans('string.Remember me') }}</label>
                        </div>
                        <div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ trans('string.Forgot your password') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex flex-column gap-3">
                        <button class="btn btn-primary w-100 fs-5">
                            {{ trans('string.Login') }}
                        </button>

                        <div class="divider"><span>{{ trans('string.Or') }}</span></div>

                        <div class="d-flex justify-content-center gap-4">
                            <div class="social__links">
                                <a href="#">
                                    <img src="{{ asset('assets/img/svg/google.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="social__links">
                                <a href="#">
                                    <img src="{{ asset('assets/img/svg/twitterx.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="social__links">
                                <a href="#">
                                    <img src="{{ asset('assets/img/svg/facebook.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center gap-1">
                        <div>
                            <span>{{ trans('string.Dont have an account') }}</span>
                            <a href="{{ route('register') }}">{{ trans('string.Create account') }}</a>
                        </div>
                        <small>
                            <a href="{{ route('index') }}" class="text-muted">
                                {{ trans('string.Register later') }}
                            </a>
                        </small>
                    </div>
                </div>
            </form>
        </div>
    </section>

    @push('scripts')
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script>
            togglePassword()
        </script>
    @endpush
</x-guest-layout>
