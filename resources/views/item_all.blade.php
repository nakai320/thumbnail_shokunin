@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<!-- container -->
<div class="container">
    <h1>サムネイル一覧</h1>
    <div class="container">
        <div class="row">
            <?php
            foreach ($items as $item) {
                if ($item->user_id == $user) {
                    $path = $item->path;
                    $read_path = str_replace('public/', 'storage/', $path);
                    $title = $item->tittle;

                    $price = $item->price;




                    $id = $item->id;
                    echo <<<ENDF
                        <div class="col-lg-4">
                    <div class="card">
                        <a href="/edit_item/$id"><img class="card-img-top" src="$read_path" alt="サムネイル画像"></a>
                    <div class="card-body">
                            <div class="card-tp"><h4 class="card-title">$title</h4>
                            <p class="card-text">$price 円</p></div>
                            <a href="/edit_item/$id" class="btn btn-success">編集する</a>
                        </div>
                </div> </div>
                ENDF;
                }
            }

            ?>








        </div>
    </div>
    {{ $items->links() }}
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