<x-modal>
    <x-slot:id>createModal</x-slot:id>
    <x-slot:title>إنشاء وسم جديد</x-slot:title>
    <x-slot:body>
        <div class="tab-content" id="pills-tabContent">
            <form>
                <div class="mb-3 mt-3">
                    <label for="name">الإسم</label>
                    <input wire:model.live.debounce='name' type="text" id="name" class="form-control"
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
                    <button wire:click="resetField" type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ trans('إغلاق') }}
                    </button>
                    <button wire:click.prevent='create' type="button" class="btn btn-primary">
                        <i class="bi bi-plus ms-2"></i>{{ trans('إضافة') }}
                    </button>
                </x-slot:button>
            </form>
    </x-slot:body>
</x-modal>
