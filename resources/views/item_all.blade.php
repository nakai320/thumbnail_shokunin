<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .container {
            margin-top: 50px;
        }

        .col-lg-4 {
            padding: 0;
        }

        .card-img-top{
            width:320px;
            height:180px;
        }
    </style>
</head>


<body>
    <div class="flex-center position-ref full-height">
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
        </div>
        @endif
    </div>

    <!-- container -->
    <div class="container">
        <h1>サムネイル一覧</h1>
        <div class="container">
            <div class="row">
                <?php
                $user = Auth::id();
                $items = DB::table('uploads')
                    ->orderByRaw('id DESC')
                    ->get();
                foreach ($items as $item) {
                    if ($item->user_id == $user) {
                        $path = $item->path;
                        $read_path = str_replace('public/', 'storage/', $path);
                        $title = $item->tittle;

                        $price = $item->price;

                        $text = $item->text;

                       
                        $id = $item->id;
                        echo <<<ENDF
                   <div class="col-lg-4">
                    <div class="card">
                        <a href="/edit_item/$id"><img class="card-img-top" src="$read_path" alt="サムネイル画像"></a>
                        <div class="card-body">
                            <h4 class="card-title">$title</h4>
                            <p class="card-text">$text</p>
                            <a href="/edit_item/$id" class="btn btn-success">編集する</a>
                        </div>
                    </div>
                </div>

                ENDF;
                    }
                }

                ?>








            </div>
        </div>
    </div>

</body>

</html>