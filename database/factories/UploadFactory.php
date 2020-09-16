<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Upload;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Upload::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'tittle' => 'テストタイトル',
        'price' => 500,
        'text' => 'これはテストです。シーダーで入れました。',
        'path' => 'public/1_2020_09_15-14_55_22_sample.jpg',
        'user_name' =>'中居'
    ];
});
