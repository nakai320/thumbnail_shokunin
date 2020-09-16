@extends('layouts.template')

<head>
    @section('title',$pen_name);

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
/* 
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
        } */

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

        .content {
            display: flex;
        }

        .item_body {
            flex: 7;
            text-align: left;
        }

        .profile_body {
            flex: 3;
            padding-left: 12px;
            text-align: center;
        }

        i {
            padding: 0.2rem;
        }
    </style>
</head>


<body>
    @include('layouts.header')
    @section('content')
    <!-- <div class="flex-center position-ref full-height">
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
    </div> -->
    <div class="container">
        <h1>サムショク</h1>
        <p>サムショクはYouTuberとサムネイル職人をつなぐサイトです。<br>
            仲介手数料０円！お好きなサムネイルがあったら、職人に直接連絡を取ることができます。</p>

        <!-- container -->

        <div class="content">
            <?php
            $items = DB::select("SELECT * FROM uploads WHERE id = {$id}");
            foreach ($items as $item) {
                $path = $item->path;
                $read_path = str_replace('public/', 'storage/', $path);
                $title = $item->tittle;
                $price = $item->price;
                $text = $item->text;
                if(isset($item->user_name)){
                    $user_name = $item->user_name;
                }else{
                $user_name = '退会したユーザーです';
            }
                $user_id = $item->user_id;
                


                echo <<<ENDF
              <div class="item_body">
        <table class="table table-bordered table-responsive">
            <tr>
                <td colspan="2"><img width=100% src=../$read_path alt="サムネイル画像"></td>
            </tr>
            <tr>
                <th class="table-active">作品タイトル</th>
                <td>{$title}</td>
            </tr>
            <tr>
                <th class="table-active">参考金額</th>
                <td>{$price}円</td>
            </tr>
            <tr>
                <th class="table-active" colspan="2">作品概要</th>
            </tr>
            <tr>
                <td colspan="2">{$text}</td>
            </tr>
        </table>
    </div> 
ENDF;
            }

            $users = DB::select("SELECT * FROM users WHERE id = {$user_id}");
            foreach ($users as $user) {
                $image_path = $user->image_path;
                $image_read_path = str_replace('public/', 'storage/', $image_path);
                $pen_name = $user->pen_name;
                $profile_text = $user->profile_text;
                $twitter = "https://twitter.com/" . $user->twitter;
                $instagram = "https://www.instagram.com/" . $user->instagram;
                $youtube = "https://www.youtube.com/" . $user->youtube;
                $url = $user->url;

                echo <<<ENDF
    <div class="profile_body">
    <table class="table table-responsive">
<thead class="thead-lignt"><tr><th><h2>プロフィール</h2></th></tr></thead>
<tr><td><img width=100% src=../$image_read_path alt="プロフィール画像"></td></tr>
<tr><td><h3>{$pen_name}</h3></td></tr>
<tr><td><p><a href="/user/$user_id">この職人の作品をさらに見る≫</a></p></td></tr>
<tr><td>
ENDF;

                if (isset($twitter)) {
                    echo "<a href='$twitter' target='_blank'><i class='fa fa-twitter-square fa-2x'></i></a>";
                }

                if (isset($youtube)) {
                    echo "<a href='$youtube' target='_blank'><i class='fa fa-youtube fa-2x'></i></a>";
                }
                if (isset($instagram)) {
                    echo "<a href='$instagram' target='_blank'><i class='fa fa-instagram fa-2x'></i></a>";
                }

                if (isset($url)) {
                    echo "<a href='$url' target='_blank'><i class='fa fa-desktop fa-2x'></i></a></td></tr>";
                }

                echo <<<ENDF
<tr><td style="text-align: left;">{$profile_text}<td><tr>
  </table>
    </div>
ENDF;
            }

            ?>
        </div>




    </div>
    @endsection
    @include('layouts.footer')