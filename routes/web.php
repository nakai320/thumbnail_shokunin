<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('top');
});
Route::get('/item/{id}/',
function ($id) {
    return view('item', compact('id'));
});
Route::get(
    '/edit_item/{id}/',
    function ($id) {
        return view('edit_item', compact('id'));
    }
);
Route::post('/edit_item/{id}/','UploadController@edit'
    
);
Route::post('/delete/','UploadController@delete');

Route::get('/home/', function () {
    return view('home');
});

Route::get('/item_all/',function () {
    return view('item_all');
});

Route::get('/user/{user_id}/', function ($user_id) {
    return view('user', compact('user_id'));
});
Route::resource('upload', 'UploadController');

Route::get('/edit_profile/', 'HomeController@profile');

Route::post('/edit_profile/', 'HomeController@edit_profile');

Auth::routes();

Route::get('/',function(){return view("welcome");});

// Route::get('/home', 'HomeController@index')->name('home');
// Route::post('/upload', 'HomeController@upload');


