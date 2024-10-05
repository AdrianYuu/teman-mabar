<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-full min-h-screen bg-green-50">
        @include('layouts.navbar')
        @yield('content')
        @include('layouts.footer')
    </div>
</body>
</html>