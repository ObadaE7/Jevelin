<div class="profile__right-row">
    <div class="d-flex justify-content-between">
        <span class="text-muted">{{ trans('dashboard.profile.About me') }}</span>
        <div class="tooltip-hint" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="info-tooltip"
            data-bs-title="{{ trans('dashboard.profile.Saves automatically') }}">
            <span class="material-icons-outlined">info</span>
        </div>
    </div>

    <form>
        <div class="row mt-2">
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between">
                    <label for="bio">{{ trans('dashboard.profile.Bio') }}</label>
                    <x-success name="bio" />
                </div>
                <textarea wire:model.blur='bio' id="bio" class="form-control" rows="7"
                    placeholder="{{ trans('dashboard.profile.Bio placeholder') }}"></textarea>
                <x-error name="bio" />
            </div>

            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between">
                    <label for="phone">{{ trans('dashboard.profile.Phone') }}</label>
                    <x-success name="phone" />
                </div>
                <input wire:model.blur='phone' type="text" id="phone" class="form-control"
                    placeholder="{{ trans('dashboard.profile.Phone placeholder') }}">
                <x-error name="phone" />
            </div>

            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between">
                    <label for="birthday">{{ trans('dashboard.profile.Birthday') }}</label>
                    <x-success name="birthday" />
                </div>
                <input wire:model.blur='birthday' type="date" id="birthday" class="form-control">
                <x-error name="birthday" />
            </div>
        </div>
    </form>
</div>
