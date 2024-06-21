<x-modal>
    <x-slot:id>editModal</x-slot:id>
    <x-slot:options>modal-lg</x-slot:options>
    <x-slot:title>
        <div class="d-flex align-items-center gap-2">
            <span class="material-icons-outlined">group_add</span>
            <span>تعديل المستخدم</span>
        </div>
    </x-slot:title>
    <x-slot:body>
        <form>
            <div class="row row-cols-md-2 row-cols-1">
                <div class="col">
                    <label for="fname">{{ trans('string.First name') }}</label>
                    <input wire:model='fname' type="text" id="fname" class="form-control"
                        placeholder="{{ trans('string.Enter your first name') }}" autofocus>
                    <x-error name="fname" />
                </div>

                <div class="col">
                    <label for="lname">{{ trans('string.Last name') }}</label>
                    <input wire:model='lname' type="text" id="lname" class="form-control"
                        placeholder="{{ trans('string.Enter your last name') }}">
                    <x-error name="lname" />
                </div>
            </div>

            <div>
                <label for="uname">{{ trans('string.User name') }}</label>
                <input wire:model='uname' type="text" id="uname" class="form-control"
                    placeholder="{{ trans('string.Enter your username') }}">
                <x-error name="uname" />
            </div>

            <div>
                <label for="email">{{ trans('string.E-mail') }}</label>
                <input wire:model='email' type="email" id="email" class="form-control"
                    placeholder="{{ trans('string.Enter your email address') }}" required />
                <x-error name="email" />
            </div>

            <x-slot:button>
                <button wire:click="resetFields" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    إغلاق
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
