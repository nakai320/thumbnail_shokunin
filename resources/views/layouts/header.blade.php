@section('header')
<header class="tp-vew-header">
    <div class="flex-center position-ref full-height">
        <h2 >
            <a href="/"><img src="/images/logo.png"></a>
    </h2>
        <div>
            <form class="form-inline" action="/">
                <div class="form-group">
                    <label class="sr-only" for="InputEmail"></label>
                    <input type="email" class="form-control" id="InputEmail" name="search" placeholder="検索">
                </div>
                <button type="submit" class="tp-fr-btn">検索</button>
            </form>
        </div>
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            <a href="{{ url('/logout') }}">Logout</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
            <a href="/">Top</a>
        </div>
        @endif
</header>
@endsection