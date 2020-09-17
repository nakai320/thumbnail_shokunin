@extends('layouts.template')

<head>
    @section('title','マイページ')

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>
<style>
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

<body>
    @include('layouts.header')
    @section('content')

    <?php
    $user_id = Auth::id();
    $user_name = Auth::user()->name;
    $users = DB::select("SELECT * FROM users WHERE id = {$user_id}");
    foreach ($users as $user) {
        $image_path = $user->image_path;
        $read_path = str_replace('public/', 'storage/', $image_path);
        $pen_name = $user->pen_name;
        $profile_text = $user->profile_text;
        $twitter = $user->twitter;
        $instagram = $user->instagram;
        $youtube = $user->youtube;
        $url = $user->url;
    }

    ?>

    <!-- container -->
    <div class="container">
        <div class="content">
            <div class="item_body">
                <h1>マイページ</h1>

                <h2><a href="/upload">作品のアップロード</a></h2>

                <h2><a href="/item_all">作品一覧</a></h2>

                <h2><a href="/edit_profile">プロフィール変更</a></h2>


            </div>
            <?php
            $user_id = Auth::id();
            $user_name = Auth::user()->name;
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
                    <thead class="thead-lignt">
                        <tr>
                            <th>
                                <h2>プロフィール</h2>
                            </th>
                        </tr>
                    </thead>
                    <tr>
                        <td><img width=100% src=../$image_read_path alt="プロフィール画像"></td>
                    </tr>
                    <tr>
                        <td>
                            <h3>{$pen_name}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><a href="/user/$user_id">この職人の作品をさらに見る≫</a></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
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
                    echo "<a href='$url' target='_blank'><i class='fa fa-desktop fa-2x'></i></a></td>
                    </tr>";
                }

                echo <<<ENDF
                     <tr>
                        <td style="text-align: left;">{$profile_text}
                        <td>
                            <tr>
                </table>
        </div>
ENDF;
            }

            ?>

        </div>

    </div>

    </div>
    @endsection
    @include('layouts.footer')
</body>

</html>