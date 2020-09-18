@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

<!-- container -->
<!-- <div class="container">
    <h1>アップロード</h1>
    <form method="POST" action="/upload" enctype="multipart/form-data">

        {{ csrf_field() }}

        <input type="file" id="file" name="file" class="form-control">
        タイトル<input type="text" id="title" name="title">
        参考価格<input type="text" id="price" name="price"><br>
        説明<textarea id="text" name="text"> </textarea>


        <button type="submit">アップロード</button> -->

<div class="container">
    <h1>アップロード</h1>
    <table>
        <form method="POST" action="/upload" enctype="multipart/form-data">
            @csrf


            <tr>
                <td>

                    作品データ</td>
                <td><input type="file" id="file" name="file" class="form-control"></td>
            </tr>

            <tr>
                <td>タイトル</td>
                <td><input type="text" id="title" name="title"></td>
            </tr>
            <tr>
                <td>参考価格</td>
                <td><input type="text" id="price" name="price"></td>
            </tr>
            <tr>
                <td>説明</td>
                <td><textarea id="text" name="text" rows="8" cols="40"></textarea></td>
            </tr>

            <tr>
                <td colspan="2">
                    <button class="btn btn-success" type="submit">アップロード</button> </td>
            </tr>
        </form>





    </table>






</div>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop