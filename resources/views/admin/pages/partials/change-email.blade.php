<div class="profile__right-row">
    <span class="text-muted">{{ trans('dashboard.profile.Update email') }}</span>
    <form>
        <div class="row mt-2">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between">
                    <label for="email">{{ trans('dashboard.profile.Email') }}</label>
                    <x-success name="email" />
                </div>
                <input wire:model='email' type="text" id="email" class="form-control"
                    placeholder="{{ trans('dashboard.profile.Email placeholder') }}">
                <x-error name="email" />
            </div>

            <div class="col-md-12 mb-3">
                <label for="current_password_email">{{ trans('dashboard.profile.Current password') }}</label>
                <div class="input-password">
                    <input wire:model='current_password_email' type="password" id="current_password_email"
                        class="form-control"
                        placeholder="{{ trans('dashboard.profile.Current password placeholder') }}">
                    <span class="material-icons-outlined input-password-icon">visibility</span>
                </div>
                <x-error name="current_password_email" />
            </div>

            <div class="d-flex justify-content-end">
                <button wire:click.prevent='saveEmail' class="btn btn-primary w-25">
                    {{ trans('dashboard.profile.Save') }}
                </button>
            </div>
        </div>
    </form>
</div>
