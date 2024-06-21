<x-modal>
    <x-slot:id>showModal</x-slot:id>
    <x-slot:title>
        <div class="d-flex align-items-center gap-2">
            <span class="material-icons-outlined">bookmarks</span>
            <span>إنشاء وسم جديد</span>
        </div>
    </x-slot:title>
    <x-slot:body>
        <form>
            <div class="mb-3 mt-3">
                <label for="name">الإسم</label>
                <input wire:model.blur='name' type="text" id="name" class="form-control"
                    placeholder="أدخل اسم الوسم">
                <x-error name="name" />
            </div>

            <div class="mb-3">
                <label for="slug">معرّف الصفحة النصي</label>
                <input wire:model='slug' type="text" id="slug" class="form-control"
                    placeholder="أدخل معرف-الصفحة-النصي">
                <x-error name="slug" />
            </div>

            <x-slot:button>
                <button wire:click="resetFields" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    إغلاق
                </button>
                <button wire:click.prevent='create' type="button" class="btn btn-primary">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-icons-outlined fs-6">add</span>
                        <span>إضافة</span>
                    </div>
                </button>
            </x-slot:button>
        </form>
    </x-slot:body>
</x-modal>
