@extends('layouts.template')

<head>
    @section('title','TOP')
    <!-- 自作フロントcss -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')
    @section('content')
    <div class="tp-main-vew">
        <div>
            <h1>サムショク</h1>
            <p>サムショクはYouTuberとサムネイル職人をつなぐサイトです。<br>
                仲介手数料０円！お好きなサムネイルがあったら、職人に直接連絡を取ることができます。</p>
        </div>
    </div>
    <!-- container -->
    <div class="container">
        <h1>サムネイル一覧</h1>
        <div class="container">
            <div class="row">
                <?php
                // $user = Auth::id();

                // $items = DB::table('uploads')
                //     ->orderByRaw('id DESC')
                //     // ->get();
                //     // ->paginate(3);
                //     ->simplePaginate(3);

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
                        <a href="/item/$id"><img class="card-img-top" src="$read_path" alt="サムネイル画像"></a>
                    <div class="card-body">
                            <div class="card-tp"><h4 class="card-title">$title</h4>
                            <p class="card-text">$price 円</p></div>
                            <a href="/item/$id" class="btn btn-success h-auto">詳細を見る</a>
                        </div>
                </div> </div>
                            
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