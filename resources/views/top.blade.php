@extends('layouts.template')

<head>
    @section('title','TOP')
    <!-- 自作フロントcss/js -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{asset('js/style.js')}}"></script>
</head>

<body>
    @include('layouts.header')
    @section('content')


    <div id="slide_bg">
        <div id="slide_side" class="rounded shadow">
            <p>サムショクは、サムネイル職人とYouTuberをつなぐサイトです。</p>
            <p>SNSを通じて直接やり取りできるので<br>
                仲介手数料は掛かりません。</p>
            <p>サムネイル職人の方へ>> <a href="/register">新規登録</a> or <a href="/login">ログイン</a></p>
            <p>YouTuberの方へ>> 登録不要でご利用できます。<br>
                お好きな雰囲気のサムネイルを見つけてください。</p>


        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-interval="2500" data-ride="carousel" style="width:600px">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="slide_img" src="images/sample.jpg" alt="サムネイル画像">
                    <!-- 画像内キャプション -->
                    <div class="carousel-caption d-none d-md-block rounded shadow">
                        <h5>一枚目</h5>
                        <p>一枚目の説明</p>
                    </div>
                </div>
                <?php
                $all_items = DB::select("SELECT * FROM uploads");
                shuffle($all_items);
                foreach ($all_items as $item) {
                    $path = $item->path;
                    $id = $item->id;
                    $read_path = str_replace('public/', 'storage/', $path);
                    $title = $item->tittle;
                    $price = $item->price;
                    $text = $item->text;




                    echo <<< TP_CAL

                <div class="carousel-item">
                    <a href="/item/$id"><img class="card-img-top slide_img" src="$read_path" alt="サムネイル画像"></a>
                 
                    <div class="carousel-caption d-none d-md-block rounded shadow">
                        <h5>$title</h5>
                        <p>$text</p>
                    </div>
                </div>
TP_CAL;
                }

                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
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
    </div>
    {{ $items->links() }}
    </div>
    @endsection
    @include('layouts.footer')