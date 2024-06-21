<x-modal>
    <x-slot:id>createModal</x-slot:id>
    <x-slot:title>
        <div class="d-flex align-items-center gap-2">
            <span class="material-icons-outlined">flag</span>
            <span>إنشاء دولة جديدة</span>
        </div>
    </x-slot:title>
    <x-slot:body>
        <form>
            <div class="mb-3 mt-3">
                <label for="name">الإسم</label>
                <input wire:model='name' type="text" id="name" class="form-control" placeholder="أدخل اسم الدولة">
                <x-error name="name" />
            </div>

            <div class="mb-3">
                <label for="flag">العلم</label>
                <input wire:model='flag' id="flag" type="file" class="form-control" accept="image/png, image/jpg, image/jpeg">
                <x-error name="flag" />
            </div>

            <x-slot:button>
                <button wire:click="resetFields" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">{{ trans('إغلاق') }}
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
