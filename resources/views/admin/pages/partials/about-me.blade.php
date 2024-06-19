<div class="profile__content-about">
    <div class="d-flex justify-content-between">
        <span class="text-muted">{{ trans('dashboard.About me') }}</span>
        <div class="tooltip-hint" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="info-tooltip"
            data-bs-title="{{ trans('dashboard.Form saves automatically') }}">
            <span class="material-icons-outlined">info</span>
        </div>
    </div>

    <form>
        <div class="row mt-2">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between">
                    <label for="bio">{{ trans('dashboard.Bio') }}</label>
                    <x-success name="bio" />
                </div>
                <textarea wire:model.live.blur='bio' id="bio" class="form-control" rows="7"
                    placeholder="{{ trans('dashboard.Tell me something about you') }}"></textarea>
                <x-error name="bio" />
            </div>

            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between">
                    <label for="phone">{{ trans('dashboard.Phone') }}</label>
                    <x-success name="phone" />
                </div>
                <input wire:model.live.blur='phone' type="text" id="phone" class="form-control"
                    placeholder="{{ trans('dashboard.Enter your phone number') }}">
                <x-error name="phone" />
            </div>

            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between">
                    <label for="birthday">{{ trans('dashboard.Birthday') }}</label>
                    <x-success name="birthday" />
                </div>
                <input wire:model.live.blur='birthday' type="date" id="birthday" class="form-control">
                <x-error name="birthday" />
            </div>
        </div>
    </form>
</div>
