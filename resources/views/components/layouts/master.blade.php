<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    @stack('styles')
</head>
<body class="h-full font-sans antialiased text-base font-normal text-gray-600 dark:text-gray-400 dark:bg-gray-900">
<div id="app" class="h-full">
    {{ $slot }}

{{--start toast or message--}}

{{--end toast or message--}}
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/customizer.js') }}"></script>
<script src="{{ asset('js/demo.js') }}"></script>

@stack('scripts')
</body>
</html>
