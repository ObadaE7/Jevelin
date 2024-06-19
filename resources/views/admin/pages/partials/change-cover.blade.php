<div class="profile__header-cover">
    @if ($this->cover && !$errors->has('cover'))
        <img src="{{ $this->cover->temporaryURL() }}" alt="{{ trans('Temp cover') }}">
    @else
        <img src="{{ isset(auth()->user()->cover) ? asset('storage/' . auth()->user()->cover) : asset('assets/img/others/cover.png') }}"
            alt="{{ trans('Profile cover') }}">
    @endif
    <div class="btn__cover-position">
        <label for="cover" class="btn__cover" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-custom-class="primary-tooltip" data-bs-title="{{ trans('dashboard.Change cover') }}">
            <input wire:model='cover' id="cover" type="file" accept="image/png, image/jpg, image/jpeg" hidden>
        </label>
    </div>
</div>
