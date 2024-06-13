<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Jevelin blog">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('includes.favicon')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('css')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles>
</head>

<body>
    {{ $slot }}
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    @stack('scripts')
    <livewire:scripts>
</body>

</html>
