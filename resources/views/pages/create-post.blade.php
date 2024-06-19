@section('breadcrumb')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('user.create.post') }}">{{ trans('string.Articles') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a>{{ trans('string.Create') }}</a></li>
    </x-breadcrumb>
@endsection

<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
</div>