<x-app-layout>
    @section('title', 'Dashboard')
    <section class="dashboard__wrapper">
        @if (Request::is('admin/*'))
            @include('admin.includes.aside')
        @else
            @include('includes.dashboard.aside')
        @endif

        <main class="dashboard__main">
            @if (Request::is('admin/*'))
                @include('admin.includes.header')
            @else
                @include('includes.dashboard.header')
            @endif
            <div class="dashboard__main-container">
                <div class="dashboard__breadcrumb">@yield('breadcrumb')</div>
                <div class="dashboard__main-content">@yield('content')</div>
            </div>
        </main>
    </section>

    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
    @endpush
</x-app-layout>
