<x-app-layout>
    @section('title', 'Dashboard')
    <section class="dashboard__wrapper">
        @include('admin.includes.aside')

        <main class="dashboard__main">
            @include('admin.includes.header')

            <div class="dashboard__main-container">
                <div class="dashboard__breadcrumb">
                    @yield('breadcrumb')
                </div>

                <div class="dashboard__main-content">
                    @yield('content')
                </div>
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
