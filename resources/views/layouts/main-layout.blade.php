<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body>
    <div class="min-h-screen w-full bg-gray-50 flex flex-col justify-between">
        @include('layouts.navbar')
        <div class="my-12 flex justify-center">
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>
</body>

</html>
