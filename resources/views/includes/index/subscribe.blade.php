<div class="main__subscribe">
    <div class="main__subscribe-form">
        <span class="subscribe__text">{{ trans('index.sections.Subscribe text') }}</span>
        <form class="subscribe__form">
            <input wire:model='email' type="text" name="email" id="email" class="form-control"
                placeholder="{{ trans('index.sections.Email placeholder') }}">
            <button wire:click.prevent='subscribe' class="main__hero-button">
                {{ trans('index.sections.Subscribe') }}
            </button>
        </form>
    </div>

    <div class="main__subscribe-img">
        <img src="{{ asset('assets/img/svg/mailbox.svg') }}" alt="{{ trans('index.sections.Illustration') }}">
    </div>
</div>
