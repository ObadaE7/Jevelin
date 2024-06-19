<div class="profile__content-email">
    <span class="text-muted">{{ trans('dashboard.Update email') }}</span>
    <form>
        <div class="row mt-2">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between">
                    <label for="email">{{ trans('dashboard.E-mail') }}</label>
                    <x-success name="email" />
                </div>
                <input wire:model='email' type="text" id="email" class="form-control"
                    placeholder="{{ trans('dashboard.Enter your email') }}">
                <x-error name="email" />
            </div>

            <div class="col-md-12 mb-3">
                <label for="eu_current_password">{{ trans('dashboard.Password') }}</label>
                <div class="input-password">
                    <input wire:model='eu_current_password' type="password" id="eu_current_password"
                        class="form-control" placeholder="{{ trans('dashboard.Enter your password') }}">
                    <span class="material-icons-outlined input-password-icon">visibility</span>
                </div>
                <x-error name="eu_current_password" />
            </div>

            <div class="d-flex justify-content-end">
                <button wire:click.prevent='saveEmail' class="btn btn-primary w-25">
                    {{ trans('dashboard.Save') }}
                </button>
            </div>
        </div>
    </form>
</div>
