@section('breadcrumb')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">{{ trans('dashboard.table.Table') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a>{{ trans('dashboard.table.Users') }}</a></li>
    </x-breadcrumb>
@endsection

<section class="table__wrapper">
    <div class="table__filter">
        <x-table-filter :columns="$columns" :searchBy="$this->searchBy" :perPages="$perPages" optCreate="true" />
    </div>

    <div class="table__body">
        <x-alert status="success" color="success" />
        <x-alert status="error" color="danger" />

        <x-table>
            @section('thead')
                @foreach ($headers as $index => $header)
                    <th scope="col"
                        @if (isset($columns[$index]) && $header !== trans('dashboard.table.Actions')) wire:click="setOrderBy('{{ $columns[$index] }}')" style="cursor: pointer;" @endif>
                        <div class="d-flex align-items-center justify-content-between">
                            <span>{{ ucfirst($header) }}</span>
                            @if (isset($columns[$index]) && $header !== trans('dashboard.table.Actions'))
                                <span class="material-icons-outlined">
                                    {{ $orderBy === $columns[$index] ? ($orderDir === 'asc' ? 'expand_less' : 'expand_more') : 'unfold_more' }}
                                </span>
                            @endif
                        </div>
                    </th>
                @endforeach
            @endsection

            @section('tbody')
                @forelse ($rows as $row)
                    <tr wire:key="{{ $row->id }}">
                        <td>
                            <img src="{{ asset('storage/' . $row->avatar) }}" class="table__img">
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <span>{{ $row->fname . ' ' . $row->lname }}</span>
                                <span class="text-muted">{{ $row->uname }}</span>
                            </div>
                        </td>
                        <td>{{ $row->email }}</td>
                        <td>
                            <div class="actions__btn">
                                <button wire:click="show({{ $row->id }})" class="btn__show" data-bs-toggle="modal"
                                    data-bs-target="#showModal">
                                </button>
                                <button wire:click="edit({{ $row->id }})" class="btn__edit" data-bs-toggle="modal"
                                    data-bs-target="#editModal">
                                </button>
                                <button wire:click="$set('rowId', {{ $row->id }})" class="btn__delete"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal">
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($headers) }}" class="text-center">
                            {{ trans('dashboard.table.No results found') }}
                        </td>
                    </tr>
                @endforelse
            @endsection
        </x-table>
    </div>

    <div class="table__paginate">{{ $rows->links() }}</div>

    <div class="table__modals">
        @include('admin.pages.tables.users.modal-create')
        @include('admin.pages.tables.users.modal-show')
        @include('admin.pages.tables.users.modal-edit')
        @include('admin.pages.tables.users.modal-delete')
    </div>
</section>

@push('scripts')
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script>
        document.addEventListener('livewire:navigated', () => {
            Livewire.on('urlReset', url => {
                history.pushState(null, null, url);
            });
        });

        document.addEventListener('closeModal', event => {
            $('#' + event.detail.modalId).modal('hide');
        });

        togglePassword()
    </script>
@endpush
