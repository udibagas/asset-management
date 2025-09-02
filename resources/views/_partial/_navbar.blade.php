<div class="navbar bg-base-100 shadow-sm">
    <div class="flex-none">
        <a href="/" class="btn btn-ghost text-xl">Asset Management System</a>
    </div>
    <div class="flex-1">
        <ul class="menu menu-horizontal px-1">
            <li><a href="/">Beranda</a></li>

            @auth
                <li><a href="/post">Post</a></li>
                <li><a href="/asset">Aset</a></li>
                <li><a href="/location">Lokasi</a></li>
                <li><a href="/category">Kategori</a></li>
            @endauth
        </ul>
    </div>

    <div>
        @auth
            Welcome {{ Auth::user()->name }}!
            <form action="/logout" method="POST" class="inline">
                @csrf
                <button type="submit" class="btn btn-ghost">Logout</button>
            </form>
        @endauth

        @guest
            <a href="{{ route('login') }}" class="btn btn-ghost">Login</a>
            <a href="{{ route('register') }}" class="btn btn-ghost">Register</a>
        @endguest
    </div>
</div>
