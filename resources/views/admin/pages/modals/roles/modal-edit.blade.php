<x-modal>
    <x-slot:id>editModal</x-slot:id>
    <x-slot:title>
        <div class="d-flex align-items-center gap-2">
            <span class="material-icons-outlined">supervisor_account</span>
            <span>تعديل الدور</span>
        </div>
    </x-slot:title>
    <x-slot:body>
        <form>
            <div class="mb-3 mt-3">
                <label for="name">الإسم</label>
                <input wire:model='name' type="text" id="name" class="form-control" placeholder="أدخل اسم الدور">
                <x-error name="name" />
            </div>

            <div class="mb-3">
                <label for="description">الوصف</label>
                <textarea wire:model='description' id="description" class="form-control" cols="30" rows="5"
                    placeholder="أوصف هذا الدور"></textarea>
                <x-error name="description" />
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
