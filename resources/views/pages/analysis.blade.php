@section('breadcrumb')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('user.analysis') }}">{{ trans('string.Analysis') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a>{{ trans('string.Analysis') }}</a></li>
    </x-breadcrumb>
@endsection

<div>
    {{-- Success is as dangerous as failure. --}}
</div>
