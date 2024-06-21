<x-guest-layout>
    <section class="auth__wrapper">
        <div class="auth__wrapper-main">
            <span class="fs-4">{{ trans('string.Verify your email') }}</span>

            <div class="mt-3">
                @if (session('status') == 'verification-link-sent')
                    <div class="text-success bg-success-subtle p-3 rounded-3">
                        {{ trans('string.Verify your email status') }}
                    </div>
                @else
                    <span>{{ trans('string.Verify your email text') }}</span>
                @endif
            </div>

            <div class="auth__wrapper-form mt-3">
                <div class="d-flex justify-content-end gap-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-secondary">{{ trans('string.Later') }}</button>
                    </form>

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">{{ trans('string.Resend') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
