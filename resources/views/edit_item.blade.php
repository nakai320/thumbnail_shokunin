@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container">
    <h1>アイテム編集</h1>

</div>
<!-- container -->
<div class="container">
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

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop