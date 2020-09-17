@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

<?php
$user_id = Auth::id();
$user_name = Auth::user()->name;
$users = DB::select("SELECT * FROM users WHERE id = {$user_id}");
foreach ($users as $user) {
    $image_path = $user->image_path;
    if (isset($image_path)) {
        $read_path = str_replace('public/', 'storage/', $image_path);
    } else {
        $read_path = 'images/no_img.jpg';
    }
    $pen_name = $user->pen_name;
    $profile_text = $user->profile_text;
    $twitter = $user->twitter;
    $instagram = $user->instagram;
    $youtube = $user->youtube;
    $url = $user->url;
}

?>

<section class="content">


    <div>
        <img width=200px src=../{{$read_path}} alt="プロフィール画像" class="rounded-circle">
    </div>
    <p>ようこそ{{$user_name}}さん</p>
    @if(!$pen_name)
    <p><a href="/edit_profile">まずはプロフィールを登録しよう！</a></p>
    @endif


    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h4>新規登録</h4>
                    <p>製作したサムネイルの登録はこちらです</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-share"></i>
                </div>
                <a href="/upload/" class="small-box-footer">登録する <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h4>作品編集</h4>
                    <p>すでに登録した作品の変更や削除はこちらです</p>
                </div>
                <div class="icon">
                    <i class="ion ion-document"></i>
                </div>
                <a href="/item_all" class="small-box-footer">編集する <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h4>プロフィール編集</h4>
                    <p>プロフィールの登録や変更はこちらです</p>
                </div>
                <div class="icon">
                    <i class="ion ion-document"></i>
                </div>
                <a href="/edit_profile" class="small-box-footer">編集する <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable"></section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
</section>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop