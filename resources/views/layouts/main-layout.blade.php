<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen w-full bg-gray-50">
        @include('layouts.navbar')
        <div class="my-12 flex justify-center">
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>
</body>

</html>
