<div class="profile__header-avatar">
    @if ($this->avatar && !$errors->has('avatar'))
        <img src="{{ $this->avatar->temporaryURL() }}" alt="{{ trans('Temp avatar') }}">
    @else
        <img src="{{ isset(auth()->user()->avatar) ? asset('storage/' . auth()->user()->avatar) : asset('assets/img/others/avatar.jpg') }}"
            alt="{{ trans('Profile avatar') }}">
    @endif
    <div wire:target='avatar' wire:loading class="loader__avatar-position">
        <div class="loader"></div>
    </div>
    <div class="btn__avatar-position">
        <label for="avatar" class="btn__avatar" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-custom-class="dark-tooltip" data-bs-title="{{ trans('dashboard.Change avatar') }}">
            <input wire:model='avatar' id="avatar" type="file" accept="image/png, image/jpg, image/jpeg" hidden>
        </label>
    </div>
    <div class="d-flex justify-content-center text-nowrap">
        <x-success name="avatar" />
        <x-error name="avatar" />
        <x-success name="cover" />
        <x-error name="cover" />
    </div>
</div>
