<div class="navbar bg-base-100 shadow-sm">
    <div class="flex-none">
        <a href="/" class="btn btn-ghost text-xl">Asset Management System</a>
    </div>
    <div class="flex-1">
        <ul class="menu menu-horizontal px-1">
            <li><a href="/">Beranda</a></li>

            @auth
                @if (Auth::user()->role === 'admin' || Auth::user()->role === 'editor')
                    <li><a href="/post">Post</a></li>
                @endif

                @if (Auth::user()->role === 'admin')
                    <li><a href="/asset">Aset</a></li>
                    <li><a href="/location">Lokasi</a></li>
                    <li><a href="/category">Kategori</a></li>
                @endif
            @endauth
        </ul>
    </div>

    <div class="flex gap-4 items-center">
        @auth
            <div>
                Welcome {{ Auth::user()->name }} ({{ Auth::user()->role }})!
            </div>
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
