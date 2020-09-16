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

    <!-- <div class="tp-main-vew">
        <div class="tp-main-tt">
            <h1>サムショク</h1>
            <p>サムショクはYouTuberとサムネイル職人をつなぐサイトです。<br>
                仲介手数料０円！お好きなサムネイルがあったら、職人に直接連絡を取ることができます。</p>
        </div>
    </div> -->

    <!-- <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/images/sample.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>ここに職人の名前</h5>
                    <p>ここに職人の説明？</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/images/sample1.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>ここに職人の名前</h5>
                    <p>ここに職人の説明？</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/images/sample2.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>ここに職人の名前</h5>
                    <p>ここに職人の説明？</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/images/sample3.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>ここに職人の名前</h5>
                    <p>ここに職人の説明？</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> -->

    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="/item/$id"><img src="images/sample.jpg" alt="サムネイル画像"></a>
                <!-- 画像内キャプション -->
                <div class="carousel-caption d-none d-md-block">
                    <h5>ここに職人の名前</h5>
                    <p>ここに職人の説明？</p>
                </div>
            </div>
                <?php
                foreach ($items as $item) {
                    $path = $item->path;
                    $id = $item->id;
                    $read_path = str_replace('public/', 'storage/', $path);
                    echo <<< TP_CAL

                <div class="carousel-item">
                    <a href="/item/$id"><img class="card-img-top" src="$read_path" alt="サムネイル画像"></a>
                    画像内キャプション
                    <div class="carousel-caption d-none d-md-block">
                        <h5>ここに職人の名前</h5>
                        <p>ここに職人の説明？</p>
                    </div>
                </div>
TP_CAL;
                }
                ?>
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
</body>

</html>