<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'], true)
    <title>@yield('title')</title>
</head>

<body>

    @include('_partial._navbar')

    <div class="my-8">
        <div class="container mx-auto py-8">
            @yield('content')
        </div>
    </div>

    <div class="bg-blue-800 text-white">
        <x-footer></x-footer>
    </div>
</body>

</html>
