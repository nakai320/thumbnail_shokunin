@extends('layouts.template')

<head>
    @section('title','作品一覧')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">



    <style>
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

        .card {
            margin-bottom: 15px;
        }

        .card-body {
            display: flex;
            position: relative;
        }

        .btn {

            position: absolute;
            right: 0.5rem;
            bottom: 0.5rem;

        }
    </style>
</head>


<body>
    @include('layouts.header')
    @section('content')
    <div class="container">
        <h1>サムショク</h1>
        <p>サムショクはYouTuberとサムネイル職人をつなぐサイトです。<br>
            仲介手数料０円！お好きなサムネイルがあったら、職人に直接連絡を取ることができます。</p>
    </div>
    <!-- container -->
    <div class="container">
        <h1>サムネイル一覧</h1>
        <div class="container">
            <div class="row">
                <?php
                $items = DB::table('uploads')
                    ->where('user_id', $user_id)
                    ->orderByRaw('id DESC')
                    ->paginate(15);


                foreach ($items as $item) {
                    $path = $item->path;
                    $read_path = str_replace('public/', 'storage/', $path);
                    $id = $item->id;
                    $title = $item->tittle;
                    $price = $item->price;
                    $text = $item->text;

                    echo <<<ENDF
                   <div class="col-lg-4">
                    <div class="card">
                        <a href="/item/$id"><img class="card-img-top" src="../$read_path" alt="サムネイル画像"></a>
                    <div class="card-body">
                            <div class="card-tp"><h4 class="card-title">$title</h4>
                            <p class="card-text">$price 円</p></div>
                            <a href="/item/$id" class="btn btn-primary h-auto">詳細を見る</a>
                        </div>
                </div> </div>

                ENDF;
                }


                ?>




            </div>
        </div>
        {{ $items->links() }}
    </div>
    @endsection
    @include('layouts.footer')