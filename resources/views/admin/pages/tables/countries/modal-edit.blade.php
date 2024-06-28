<x-modal>
    <x-slot:id>editModal</x-slot:id>
    <x-slot:title>
        <div class="d-flex align-items-center gap-2">
            <span class="material-icons-outlined">flag</span>
            <span>@lang('dashboard.modal.countries.Edit country title')</span>
        </div>
    </x-slot:title>
    <x-slot:body>
        <form>
            <div class="mb-3 mt-3">
                <label for="name">@lang('dashboard.modal.countries.Name')</label>
                <input wire:model='name' type="text" id="name" class="form-control" placeholder="@lang('dashboard.modal.countries.Name placeholder')">
                <x-error name="name" />
            </div>

            <div class="mb-3">
                <label for="flag">@lang('dashboard.modal.countries.Flag')</label>
                <div class="d-flex justify-content-center">
                    <label for="flag" class="table__image-preview">
                        @if ($flag && !$errors->has('flag'))
                            <img src="{{ $flag->temporaryURL() }}" class="rounded" alt="@lang('dashboard.modal.categories.Thumbnail')">
                        @elseif ($existingFlag)
                            <img src="{{ asset('storage/' . $existingFlag) }}" class="rounded"
                                alt="{{ $name }}">
                        @else
                            <span class="material-icons-outlined fs-1">flag</span>
                            <span>@lang('dashboard.modal.countries.Click here')</span>
                        @endif
                    </label>
                </div>
                <input wire:model='flag' id="flag" type="file" class="form-control"
                    accept="image/png, image/jpg, image/jpeg" hidden>
                <x-error name="flag" />
            </div>

            <x-slot:button>
                <button wire:click="resetFields" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    @lang('dashboard.modal.Close')
                </button>
                <button wire:click.prevent='update({{ $rowId }})' type="button" class="btn btn-primary">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined fs-6">update</span>
                        <span>@lang('dashboard.modal.Update')</span>
                    </div>
                </button>
            </x-slot:button>
        </form>
    </x-slot:body>
</x-modal>
