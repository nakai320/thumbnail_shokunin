@section('header')
<div class="flex-center position-ref full-height">
    <h2 class="tp-nm"><a href="/">サムショク</a></h2>
    <!-- <div>
        <form class="form-inline">
            <div class="form-group">
                <label class="sr-only" for="InputEmail">メール・アドレス</label>
                <input type="email" class="form-control" id="InputEmail" placeholder="メール・アドレス">
            </div>
        </form>
    </div> -->
    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
        <a href="/">Top</a>
    </div>
    @endif
    @endsection