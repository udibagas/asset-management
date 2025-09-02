<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body>
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-96 border border-gray-200 shadow p-8 rounded-2xl">
            @yield('content')
        </div>
    </div>
</body>

</html>
