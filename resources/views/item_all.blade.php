@extends('layouts.template')

<head>
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    @section('title','マイページ')

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>




</head>


<body>
    @include('layouts.header')
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
    @endsection
    @include('layouts.footer')
</body>

</html>