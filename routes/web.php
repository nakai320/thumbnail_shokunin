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
    $user = Auth::id();

    $items = DB::table('uploads')
        ->orderByRaw('id DESC')
        // ->get();
        ->paginate(15);
        
    return view(
    'top', ['user' => $user,'items'=>$items]);
});
Route::get('/logout', function () {
    Auth::logout();
    return Redirect::to('/');
});

Route::get('/item/{id}/',
function ($id) {
        $items = DB::select("SELECT * FROM uploads WHERE id = {$id}");
        foreach($items as $item){
        $user_id = $item->user_id;
        $pen_names = DB::select("SELECT * FROM users WHERE id = {$user_id}");
        foreach($pen_names as $pen_name){
           $pen_name = $pen_name->pen_name;
               
        }
            if (!isset($pen_name)) {
                    $pen_name ='退会したユーザーです';
                } 
        }
        
    return view('item', compact('id'),['pen_name'=>$pen_name]);
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
Route::post('/delete_profile/', 'HomeController@delete');

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



// Route::get('/home', 'HomeController@index')->name('home');
// Route::post('/upload', 'HomeController@upload');


