<x-modal>
    <x-slot:id>deleteModal</x-slot:id>
    <x-slot:title>
        <div class="d-flex align-items-center gap-2">
            <span class="material-icons-outlined">supervisor_account</span>
            <span>{{ trans('dashboard.modal.roles.Delete role title') }}</span>
        </div>
    </x-slot:title>
    <x-slot:body>{{ trans('dashboard.modal.roles.Delete role warning') }}</x-slot:body>
    <x-slot:button>
        <button wire:click="resetFields" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            {{ trans('dashboard.modal.Close') }}
        </button>
        <button wire:click='delete({{ $rowId }})' type="button" class="btn btn-danger">
            <div class="d-flex align-items-center gap-2">
                <span class="material-icons-outlined fs-6">delete</span>
                <span>{{ trans('dashboard.modal.Delete') }}</span>
            </div>
        </button>
    </x-slot:button>
</x-modal>
