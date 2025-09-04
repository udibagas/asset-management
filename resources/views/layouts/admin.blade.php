<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body>

    @include('_partial._navbar')

    <div class="container mx-auto py-8 flex gap-8">
        <ul class="menu bg-base-200 w-70 rounded-xl p-4 space-y-2">
            <li><a href="/post" class="@if (request()->is('post*')) menu-active @endif">Post</a></li>
            <li><a href="/asset" class="@if (request()->is('asset*')) menu-active @endif">Aset</a></li>
            <li><a href="/location" class="@if (request()->is('location*')) menu-active @endif">Lokasi</a></li>
            <li><a href="/category" class="@if (request()->is('category*')) menu-active @endif">Kategori</a></li>
        </ul>
        <div class="flex-1">
            @yield('content')
        </div>
    </div>
</body>

</html>
