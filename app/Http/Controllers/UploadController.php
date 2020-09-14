<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
class UploadController extends Controller
{
 
    public function index(){

    	return view('upload');
    }
    

    public function store(Request $request)
    {
        $now = Carbon::now('Asia/Tokyo')->format('Y_m_d-H_i_s');
        $user= Auth::id();
        $user_name = Auth::user()->name;
        $file_name = $user.'_'.$now.'_'.$request->file('file')->getClientOriginalName();
        $path =$request->file('file')->storeAs('public', $file_name);
        $title=$request->input('title');
        $price = $request->input('price'); 
        $text =$request->input('text');
        DB::table('uploads')->insert([
            'user_id' => $user,
            'path' => $path,
            'tittle' => $title,
            'price' => $price,
            'text' => $text,
            'created_at' => $now,
            'user_name' => $user_name

        ]);
        return view('/home');
    }

    public function edit(Request $request)
    {
       $id=$request->input('new');
        $now = Carbon::now('Asia/Tokyo')->format('Y_m_d-H_i_s');
        $user = Auth::id();
        $user_name = Auth::user()->name;
        $path= $request->input('path');
        if($request->file('file')){
            $file_name = $user . '_' . $now . '_' . $request->file('file')->getClientOriginalName();
           $path = $request->file('file')->storeAs('public', $file_name); 
        }
        $title = $request->input('title');
        $price = $request->input('price');
        $text = $request->input('text');


        DB::table('uploads')
        ->where('id', '=',$id ) 
        ->update([
            'id' => $id,
            'user_id' => $user,
            'path' => $path,
            'tittle' => $title,
            'price' => $price,
            'text' => $text,
            'created_at' => $now,
            'user_name' => $user_name
        ]);
        return view('/home');
        }

    public function delete(Request $request)
    {
    
    $id = $request->input('delete_data');
        
            DB::table('uploads')->where('id', '=', $id)->delete();
        return view('/home');
}}

