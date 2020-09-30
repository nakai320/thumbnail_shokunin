@section('header')
<header class="tp-vew-header">
    <!-- <div class="flex-center position-ref full-height">
        <h2>
            <a href="/"><img src="/images/logo.png"></a>
        </h2>
        <div>
            <form class="form-inline" action="/" method="post"> -->
    <!-- @if (Route::has('login'))
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
    @endif -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><img src="/images/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul> -->

        @if (Route::has('login'))
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @auth
                <li class="nav-item active links">
                    <a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="nav-item links">
                    <a href="{{ url('/logout') }}">Logout</a>
                </li>
                @else
                <li class="nav-item links">
                    <a href="{{ route('login') }}">Login</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item links">
                    <a href="{{ route('register') }}">Register</a>
                </li>
                @endif
                @endauth
                <li class="nav-item links">
                    <a href="/">Top</a>
                </li>
                @endif
            </ul>
            <form class="form-inline my-2 my-lg-0" action="/" method="post">
                @csrf
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

        </div>
    </nav>
</header>
@endsection