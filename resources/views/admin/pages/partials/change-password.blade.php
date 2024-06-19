<div class="profile__content-password">
    <span class="text-muted">{{ trans('dashboard.Update password') }}</span>
    <form>
        <div class="row mt-2">
            <div class="col-md-12 mb-3">
                <label for="current_password">{{ trans('dashboard.Current password') }}</label>
                <div class="input-password">
                    <input wire:model='current_password' type="password" id="current_password" class="form-control"
                        placeholder="{{ trans('dashboard.Enter your current password') }}">
                    <span class="material-icons-outlined input-password-icon">visibility</span>
                </div>
                <x-error name="current_password" />
            </div>

            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between">
                    <label for="password">{{ trans('dashboard.Password') }}</label>
                    <x-success name="password" />
                </div>
                <div class="input-password">
                    <input wire:model='password' type="password" id="password" class="form-control"
                        placeholder="{{ trans('dashboard.Enter your password') }}">
                    <span class="material-icons-outlined input-password-icon">visibility</span>
                </div>
                <x-error name="password" />
            </div>

            <div class="col-md-12 mb-3">
                <label for="password_confirmation">{{ trans('dashboard.Confirm password') }}</label>
                <div class="input-password">
                    <input wire:model='password_confirmation' type="password" id="password_confirmation"
                        class="form-control" placeholder="{{ trans('dashboard.Confirm your password') }}">
                    <span class="material-icons-outlined input-password-icon">visibility</span>
                </div>
                <x-error name="password_confirmation" />
            </div>

            <div class="d-flex justify-content-end">
                <button wire:click.prevent='savePassword' class="btn btn-primary w-25">
                    {{ trans('dashboard.Save') }}
                </button>
            </div>
        </div>
    </form>
</div>
