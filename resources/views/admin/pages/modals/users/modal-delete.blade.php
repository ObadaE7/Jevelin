<x-modal>
    <x-slot:id>deleteModal</x-slot:id>
    <x-slot:title>
        <div class="d-flex align-items-center gap-2">
            <span class="material-icons-outlined">bookmarks</span>
            <span>حذف الوسم</span>
        </div>
    </x-slot:title>
    <x-slot:body>هل أنت متأكد أنك تريد حذف هذا الوسم؟</x-slot:body>
    <x-slot:button>
        <button wire:click="resetFields" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            إغلاق
        </button>
        <button wire:click='delete({{ $rowId }})' type="button" class="btn btn-danger">
            <div class="d-flex align-items-center gap-2"><span class="material-icons-outlined fs-6">delete</span>حذف
            </div>
        </button>
    </x-slot:button>
</x-modal>
