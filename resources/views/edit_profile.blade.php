@extends('layouts.template')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @section('title','マイページ')

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>
<style>
    .btn {
        position: relative;
        right: 0;
        bottom: 0;
    }
</style>

<body>
    @include('layouts.header')
    @section('content')
    <div class="container">
        <h1>プロフィール編集</h1>




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
        <div class="container">
            <table>
                <form method="POST" action="/edit_profile" enctype="multipart/form-data">
                    @csrf
                    {{$user_name}}さん
                    <tr>
                        <td colspan="2">
                            <img width=200px src=../{{$read_path}} alt="プロフィール画像">
                        </td>
                    </tr>
                    <tr>
                        <td>

                            画像を変更する</td>
                        <td><input type="file" id="file" name="file" class="form-control"></td>
                    </tr>

                    <tr>
                        <td>ペンネーム</td>
                        <td><input type="text" id="pen_name" name="pen_name" value={{$pen_name}}></td>
                    </tr>
                    <tr>
                        <td>プロフィール文</td>
                        <td><textarea id="profile_text" name="profile_text">{{$profile_text}}</textarea></td>
                    </tr>
                    <tr>
                        <td>ツイッター(アカウント名を入力※@より後ろ)</td>
                        <td><input type="text" id="twitter" name="twitter" value={{$twitter}}></td>
                    </tr>
                    <tr>
                        <td>インスタグラム(アカウント名を入力)</td>
                        <td><input type="text" id="instagram" name="instagram" value={{$instagram}}></td>
                    </tr>
                    <tr>
                        <td>YouTube(チャンネルIDを入力)</td>
                        <td><input type="text" id="youtube" name="youtube" value={{$youtube}}></td>
                    </tr>
                    <tr>
                        <td>その他ページ</td>
                        <td><input type="text" id="url" name="url" value={{$url}}></td>
                    </tr>


                    <tr>
                        <td></td>
                        <td>
                            <input type="hidden" name="image_path" value="{{$image_path}}">
                            <button class="btn btn-success" type="submit" name="new" value={{$id}}>更新</button>
                </form>
                </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <form method="POST" action="/delete_profile/" enctype="multipart/form-data">

                            <input type="hidden" name="delete_data" value="{{$user_id}}">

                            <input class="btn btn-danger" type="submit" name='delete' value="削除" onclick="return confirm('本当に削除しますか？')">
                            @csrf
                        </form>
                    </td>
                </tr>
            </table>


        </div>







    </div>
    @endsection
    @include('layouts.footer')
</body>

</html>