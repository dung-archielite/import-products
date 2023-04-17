<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toast/toasting.css') }}">
    <script src="{{ asset('js/toast/toasting.js') }}"></script>
    @stack('styles')
</head>
<body>

{{ $slot }}

</body>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
<script>
    $(window).on('load', function () {
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toasting.create({
                    "title": "Error",
                    "text": "{{ $error }}",
                    "type": "error",
                    "progressBarType": "rainbow"
                });
            @endforeach
        @endif
        @if (session()->has('success'))
            toasting.create({
                "title": "Success",
                "text": "{{session()->get('success')}}",
                "type": "success",
                "progressBarType": "rainbow"
            });
        @endif
    });
</script>
</html>
