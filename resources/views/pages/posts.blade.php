@section('breadcrumb')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('user.posts') }}">{{ trans('string.Articles') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a>{{ trans('string.Show') }}</a></li>
    </x-breadcrumb>
@endsection

<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>
