<div class="main__subscribe">
    <div class="main__subscribe-form">
        <span class="subscribe__text">{{ trans('string.Subscribe text') }}</span>
        <form class="subscribe__form">
            <input type="text" name="email" id="email" class="form-control"
                placeholder="{{ trans('string.Enter your email address') }}">
            <button class="main__hero-button">{{ trans('string.Subscribe') }}</button>
        </form>
    </div>

    <div class="main__subscribe-img">
        <img src="{{ asset('assets/img/svg/mailbox.svg') }}" alt="">
    </div>
</div>
