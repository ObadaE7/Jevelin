<div class="profile__right-row">
    <span class="text-muted">{{ trans('dashboard.profile.Update password') }}</span>
    <form>
        <div class="row mt-2">
            <div class="col-md-12 mb-3">
                <label for="current_password">{{ trans('dashboard.profile.Current password') }}</label>
                <div class="input-password">
                    <input wire:model='current_password' type="password" id="current_password" class="form-control"
                        placeholder="{{ trans('dashboard.profile.Current password placeholder') }}">
                    <span class="material-icons-outlined input-password-icon">visibility</span>
                </div>
                <x-error name="current_password" />
            </div>

            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between">
                    <label for="password">{{ trans('dashboard.profile.New password') }}</label>
                    <x-success name="password" />
                </div>
                <div class="input-password">
                    <input wire:model='password' type="password" id="password" class="form-control"
                        placeholder="{{ trans('dashboard.profile.New password placeholder') }}">
                    <span class="material-icons-outlined input-password-icon">visibility</span>
                </div>
                <x-error name="password" />
            </div>

            <div class="col-md-12 mb-3">
                <label for="password_confirmation">{{ trans('dashboard.profile.Confirm password') }}</label>
                <div class="input-password">
                    <input wire:model='password_confirmation' type="password" id="password_confirmation"
                        class="form-control"
                        placeholder="{{ trans('dashboard.profile.Confirm password placeholder') }}">
                    <span class="material-icons-outlined input-password-icon">visibility</span>
                </div>
                <x-error name="password_confirmation" />
            </div>

            <div class="d-flex justify-content-end">
                <button wire:click.prevent='savePassword' class="btn btn-primary w-25">
                    {{ trans('dashboard.profile.Save') }}
                </button>
            </div>
        </div>
    </form>
</div>
