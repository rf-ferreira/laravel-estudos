@auth
    <p>Logged in as {{ Auth::user()->login }}</p>
    <a href="{{ route('logout') }}">Logout</a>
@endauth
@guest
    <p>Not logged in</p>
    <a href="{{ route('login') }}">Login</a>
@endguest