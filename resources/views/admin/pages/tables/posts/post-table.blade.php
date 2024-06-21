@section('breadcrumb')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.posts') }}">{{ trans('string.Table') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a>{{ trans('string.Articles') }}</a></li>
    </x-breadcrumb>
@endsection

<div class="table__wrapper">
    <div class="table__filter">
        <x-table-filter :columns="$this->columns" :searchBy="$this->searchBy" :perPages="$this->perPages" optCreate="true" />
    </div>

    <div class="table__body">
        <x-table>
            @section('thead')
                @foreach ($headers as $header)
                    <th scope="col"
                        @unless ($header === 'Actions')
                            wire:click="setOrderBy('{{ $header }}')" style="cursor: pointer;"
                        @endunless>

                        <div class="d-flex align-items-center justify-content-between">
                            <span>{{ ucfirst($header) }}</span>
                            @unless ($header === 'Actions')
                                <span class="material-icons-outlined">
                                    {{ $orderBy === $header ? ($orderDir === 'asc' ? 'expand_less' : 'expand_more') : 'unfold_more' }}
                                </span>
                            @endunless
                        </div>
                    </th>
                @endforeach
            @endsection

            @section('tbody')
                @forelse ($rows as $row)
                    <tr wire:key="{{ $row->id }}">
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->subtitle }}</td>
                        <td>{{ $row->slug }}</td>
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
                            {{ trans('No Result Found') }}
                        </td>
                    </tr>
                @endforelse
            @endsection
        </x-table>
    </div>

    <div class="table__paginate">
        {{ $rows->links() }}
    </div>
</div>
