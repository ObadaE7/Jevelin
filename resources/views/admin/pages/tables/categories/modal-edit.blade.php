<x-modal>
    <x-slot:id>editModal</x-slot:id>
    <x-slot:options>modal-lg</x-slot:options>
    <x-slot:title>
        <div class="d-flex align-items-center gap-2">
            <span class="material-icons-outlined">category</span>
            <span>@lang('dashboard.modal.categories.Edit category title')</span>
        </div>
    </x-slot:title>
    <x-slot:body>
        <form>
            <div class="mb-3 mt-3">
                <label for="name">@lang('dashboard.modal.categories.Name')</label>
                <input wire:model.blur='name' type="text" id="name" class="form-control"
                    placeholder="@lang('dashboard.modal.categories.Name placeholder')">
                <x-error name="name" />
            </div>

            <div class="mb-3 mt-3">
                <label for="slug">@lang('dashboard.modal.categories.Slug')</label>
                <input wire:model='slug' type="text" id="slug" class="form-control"
                    placeholder="{{ trans('dashboard.modal.categories.Slug placeholder') }}">
                <x-error name="slug" />
            </div>

            <div class="mb-3 mt-3">
                <label for="description">@lang('dashboard.modal.categories.Description')</label>
                <textarea wire:model='description' id="description" class="form-control" placeholder="@lang('dashboard.modal.categories.Description placeholder')" cols="30"
                    rows="5"></textarea>
                <x-error name="description" />
            </div>

            <div class="mb-3">
                <label for="image">@lang('dashboard.modal.categories.Thumbnail')</label>
                <div class="d-flex justify-content-center">
                    <label for="image" class="table__image-preview">
                        @if ($image && !$errors->has('image'))
                            <img src="{{ $image->temporaryURL() }}" class="rounded" alt="@lang('dashboard.modal.categories.Thumbnail')">
                        @elseif ($existingImage)
                            <img src="{{ asset('storage/' . $existingImage) }}" class="rounded"
                                alt="{{ $slug }}">
                        @else
                            <span class="material-icons-outlined fs-1">add_photo_alternate</span>
                            <span>@lang('dashboard.modal.categories.Click here')</span>
                        @endif
                    </label>
                </div>
                <input wire:model='image' id="image" type="file" class="form-control"
                    accept="image/png, image/jpg, image/jpeg" hidden>
                <x-error name="image" />
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
