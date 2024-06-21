<x-guest-layout>
    <section class="auth__wrapper">
        <div class="auth__wrapper-main">
            <span class="fs-4">{{ trans('string.Forget Password') }}</span>

            <div class="mt-3">
                @if (session('status'))
                    <div class="text-success bg-success-subtle p-3 rounded-3">
                        {{ trans('string.Forget Password status') }}
                    </div>
                @else
                    <span>{{ trans('string.Forget Password text') }}</span>
                @endif
            </div>

            <div class="auth__wrapper-form mt-3">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email">{{ trans('string.E-mail') }}</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email') }}" placeholder="{{ trans('string.Enter your email address') }}"
                            required autofocus>
                        <x-error name="email" />
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('login') }}" class="btn btn-secondary">{{ trans('string.Cancel') }}</a>
                        <button type="submit" class="btn btn-primary">{{ trans('string.Reset Link') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>
