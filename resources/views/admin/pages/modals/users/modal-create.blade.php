<x-modal>
    <x-slot:id>createModal</x-slot:id>
    <x-slot:options>modal-lg</x-slot:options>
    <x-slot:title>
        <div class="d-flex align-items-center gap-2">
            <span class="material-icons-outlined">group_add</span>
            <span>إنشاء مستخدم جديد</span>
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

            <div>
                <label for="password">{{ trans('string.Password') }}</label>
                <div class="input-password">
                    <input wire:model='password' type="password" id="password" class="form-control"
                        placeholder="{{ trans('string.Enter the password') }}" required />
                    <span class="material-icons-outlined input-password-icon">visibility</span>
                </div>
                <x-error name="password" />
            </div>

            <div>
                <label for="password_confirmation">{{ trans('string.Confirm password') }}</label>
                <div class="input-password">
                    <input wire:model='password_confirmation' type="password" id="password_confirmation"
                        class="form-control" placeholder="{{ trans('string.Retype the password') }}">
                    <span class="material-icons-outlined input-password-icon">visibility</span>
                </div>
                <x-error name="password_confirmation" />
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
