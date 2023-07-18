<!doctype html>
<html lang="en">
<head>
    <title>QOTSA API</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @include('fonts.roboto')
    @vite('resources/js/app.js')
</head>
<body class="font-raleway">
<div class="flex">
    <div class="w-1/5">
        @include('components.nav')
    </div>
    <div class="w-full bg-cream">
        @include('components.header')
        @yield('content')
    </div>
</div>
</body>
</html>
