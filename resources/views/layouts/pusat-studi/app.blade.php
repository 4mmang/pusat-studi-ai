<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>
        @yield('title')
    </title>
</head>

<body>
    @include('layouts.pusat-studi.navbar')
    @yield('content')
    @include('layouts.pusat-studi.footer')
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('scripts')
</body>

</html>
