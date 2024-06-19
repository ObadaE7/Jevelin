<div class="profile__content-information">
    <div class="d-flex justify-content-between">
        <span class="text-muted">{{ trans('dashboard.Personal information') }}</span>
        <div class="tooltip-hint" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="info-tooltip"
            data-bs-title="{{ trans('dashboard.Form saves automatically') }}">
            <span class="material-icons-outlined">info</span>
        </div>
    </div>

    <form>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="d-flex justify-content-between">
                    <label for="fname">{{ trans('dashboard.First name') }}</label>
                    <x-success name="fname" />
                </div>
                <input wire:model.live.blur='fname' type="text" id="fname" class="form-control"
                    placeholder="{{ trans('dashboard.Enter your first name') }}">
                <x-error name="fname" />
            </div>

            <div class="col-md-6">
                <div class="d-flex justify-content-between">
                    <label for="lname">{{ trans('dashboard.Last name') }}</label>
                    <x-success name="lname" />
                </div>
                <input wire:model.live.blur='lname' type="text" id="lname" class="form-control"
                    placeholder="{{ trans('dashboard.Enter your last name') }}">
                <x-error name="lname" />
            </div>

            <div class="col-md-12 mt-3">
                <div class="d-flex justify-content-between">
                    <label for="uname">{{ trans('dashboard.Username') }}</label>
                    <x-success name="uname" />
                </div>
                <input wire:model.live.blur='uname' type="text" id="uname" class="form-control"
                    placeholder="{{ trans('dashboard.Enter your user name') }}">
                <x-error name="uname" />
            </div>

            <div class="col-md-12 mt-3">
                <div class="d-flex justify-content-between">
                    <label for="country_id">{{ trans('dashboard.Country') }}</label>
                    <x-success name="country_id" />
                </div>
                <select wire:model.live.blur='country_id' id="country_id" class="form-select">
                    <option value="" selected disabled>{{ trans('dashboard.Select your country') }}</option>
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
                    <label for="role_id">{{ trans('dashboard.Role') }}</label>
                    <x-success name="role_id" />
                </div>
                <select wire:model.live.blur='role_id' id="role_id" class="form-select">
                    <option value="" selected disabled>{{ trans('dashboard.Select your role') }}</option>
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
