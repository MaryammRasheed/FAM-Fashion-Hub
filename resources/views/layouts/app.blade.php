<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Website')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('layouts.header')   <!-- Dynamic Header -->

    <main>
        @yield('content')       <!-- Page-specific content -->
    </main>

    @include('layouts.footer')   <!-- Dynamic Footer -->

    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
