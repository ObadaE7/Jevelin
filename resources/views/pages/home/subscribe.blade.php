<div class="main__subscribe">
    <div class="main__subscribe-form">
        <span class="subscribe__text">@lang('index.sections.Subscribe text')</span>
        <form class="subscribe__form">
            <input wire:model='email' type="text" name="email" id="email" class="form-control"
                placeholder="@lang('index.sections.Email placeholder')">
            <button wire:click.prevent='subscribe' class="main__hero-button">
                @lang('index.sections.Subscribe')
            </button>
        </form>
    </div>

    <div class="main__subscribe-img">
        <img src="{{ asset('assets/img/svg/mailbox.svg') }}" alt="@lang('index.sections.Illustration')">
    </div>
</div>
