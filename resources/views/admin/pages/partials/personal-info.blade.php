<div class="profile__right-row">
    <div class="d-flex justify-content-between">
        <span class="text-muted">{{ trans('dashboard.profile.Personal information') }}</span>
        <div class="tooltip-hint" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="info-tooltip"
            data-bs-title="{{ trans('dashboard.profile.Saves automatically') }}">
            <span class="material-icons-outlined">info</span>
        </div>
    </div>

    <form>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="d-flex justify-content-between">
                    <label for="fname">{{ trans('dashboard.profile.First name') }}</label>
                    <x-success name="fname" />
                </div>
                <input wire:model.blur='fname' type="text" id="fname" class="form-control"
                    placeholder="{{ trans('dashboard.profile.First name placeholder') }}">
                <x-error name="fname" />
            </div>

            <div class="col-md-6">
                <div class="d-flex justify-content-between">
                    <label for="lname">{{ trans('dashboard.profile.Last name') }}</label>
                    <x-success name="lname" />
                </div>
                <input wire:model.blur='lname' type="text" id="lname" class="form-control"
                    placeholder="{{ trans('dashboard.profile.Last name placeholder') }}">
                <x-error name="lname" />
            </div>

            <div class="col-md-12 mt-3">
                <div class="d-flex justify-content-between">
                    <label for="uname">{{ trans('dashboard.profile.Username') }}</label>
                    <x-success name="uname" />
                </div>
                <input wire:model.blur='uname' type="text" id="uname" class="form-control"
                    placeholder="{{ trans('dashboard.profile.User name placeholder') }}">
                <x-error name="uname" />
            </div>

            <div class="col-md-12 mt-3">
                <div class="d-flex justify-content-between">
                    <label for="country_id">{{ trans('dashboard.profile.Country') }}</label>
                    <x-success name="country_id" />
                </div>
                <select wire:model.blur='country_id' id="country_id" class="form-select">
                    <option value="" selected>
                        {{ trans('dashboard.profile.Country placeholder') }}
                    </option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ $country_id == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
                <x-error name="country_id" />
            </div>

            <div class="col-md-12 mt-3">
                <div class="d-flex justify-content-between">
                    <label for="role_id">{{ trans('dashboard.profile.Role') }}</label>
                    <x-success name="role_id" />
                </div>
                <select wire:model.blur='role_id' id="role_id" class="form-select">
                    <option value="" selected>
                        {{ trans('dashboard.profile.Role placeholder') }}
                    </option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $role_id == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                <x-error name="role_id" />
            </div>
        </div>
    </form>
</div>
