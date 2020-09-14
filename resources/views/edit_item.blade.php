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
    <div class="container">
        <h1>アイテム編集</h1>

    </div>
    <!-- container -->
    <div class="container">
        <h1>サムネイル</h1>
        <?php

        $items = DB::select("SELECT * FROM uploads WHERE id = {$id}");
        foreach ($items as $item) {
            $path = $item->path;
            $read_path = str_replace('public/', 'storage/', $path);
            $title = $item->tittle;
            $price = $item->price;
            $text = $item->text;
            $user_name = $item->user_name;
            $id = $item->id;
        }

        ?>
        <div class="container">
            <table>
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf

                    <tr>
                        <td colspan="2">
                            <img width=500px src=../{{$read_path}} alt="サムネイル画像">
                        </td>
                    </tr>
                    <tr>
                        <td>

                            画像を変更する</td>
                        <td><input type="file" id="file" name="file" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>タイトル</td>
                        <td><input type="text" id="title" name="title" value={{$title}}></td>
                    </tr>
                    <tr>
                        <td>参考価格</td>
                        <td><input type="text" id="price" name="price" value={{$price}}></td>
                    </tr>
                    <tr>
                        <td>説明</td>
                        <td><textarea id="text" name="text">{{$text}}</textarea></td>
                    </tr>

                    <tr>
                        <td>
                            <input type="hidden" name="path" value="{{$path}}">
                            <button class="btn btn-success" type="submit" name="new" value={{$id}}>更新</button>
                </form>
                </td>
                <td>
                    <form method="POST" action="/delete" enctype="multipart/form-data">

                        <input type="hidden" name="delete_data" value="{{$id}}">
                        <input class="btn btn-danger" type="submit" name='delete' value="商品削除" onclick="return confirm('本当に削除しますか？')">
                        @csrf
                    </form>
                </td>
                </tr>
            </table>


        </div>







    </div>

</body>

</html>