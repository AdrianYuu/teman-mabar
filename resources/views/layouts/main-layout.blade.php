<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="w-full min-h-screen bg-gray-50">
        @include('layouts.navbar')
        <div class="flex justify-center my-12">
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>
</body>
</html>