@section('breadcrumb')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.profile') }}">{{ trans('string.Profile') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a>{{ trans('string.My Profile') }}</a></li>
    </x-breadcrumb>
@endsection

<div>
    {{-- Be like water. --}}
</div>