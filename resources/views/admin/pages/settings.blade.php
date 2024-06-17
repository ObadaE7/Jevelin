@section('breadcrumb')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.settings') }}">{{ trans('string.Settings') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a>{{ trans('string.Site Settings') }}</a></li>
    </x-breadcrumb>
@endsection

<div>
    {{-- In work, do what you enjoy. --}}
</div>
