<x-modal>
    <x-slot:id>editModal</x-slot:id>
    <x-slot:options>modal-lg</x-slot:options>
    <x-slot:title>
        <div class="d-flex align-items-center gap-2">
            <span class="material-icons-outlined">category</span>
            <span>تعديل الفئة</span>
        </div>
    </x-slot:title>
    <x-slot:body>
        <form>
            <div class="mb-3 mt-3">
                <label for="name">الإسم</label>
                <input wire:model.blur='name' type="text" id="name" class="form-control" placeholder="أدخل اسم الفئة">
                <x-error name="name" />
            </div>

            <div class="mb-3 mt-3">
                <label for="slug">الرابط</label>
                <input wire:model='slug' type="text" id="slug" class="form-control"
                    placeholder="أدخل-المعرف-النصي">
                <x-error name="slug" />
            </div>

            <div class="mb-3 mt-3">
                <label for="description">الوصف</label>
                <textarea wire:model='description' id="description" class="form-control" placeholder="أدخل وصف لهذه الفئة"
                    cols="30" rows="5"></textarea>
                <x-error name="description" />
            </div>

            <div class="mb-3">
                <label for="image">الصورة</label>
                <input wire:model='image' id="image" type="file" class="form-control"
                    accept="image/png, image/jpg, image/jpeg">
                <x-error name="image" />
            </div>

            <x-slot:button>
                <button wire:click="resetFields" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">{{ trans('إغلاق') }}
                </button>
                <button wire:click.prevent='update({{ $rowId }})' type="button" class="btn btn-primary">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined fs-6">update</span>
                        <span>تحديث</span>
                    </div>
                </button>
            </x-slot:button>
        </form>
    </x-slot:body>
</x-modal>
