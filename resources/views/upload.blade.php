@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

<!-- container -->
<div class="container">
    <h1>アップロード</h1>
    <form method="POST" action="/upload" enctype="multipart/form-data">

        {{ csrf_field() }}

        <input type="file" id="file" name="file" class="form-control">
        タイトル<input type="text" id="title" name="title">
        参考価格<input type="text" id="price" name="price"><br>
        説明<textarea id="text" name="text"> </textarea>


        <button type="submit">アップロード</button>

    </form>



</div>
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