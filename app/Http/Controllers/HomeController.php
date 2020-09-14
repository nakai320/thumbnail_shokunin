<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->id());

        return view('home/index', compact('user'));
    }
    public function item()
    {
        $user = User::find(auth()->id());

        return view('home/index', compact('user'));
    }

    public function profile()
    {
        $id = User::find(auth()->id());

        return view('edit_profile', compact('id'));
    }
    public function edit_profile(Request $request)
    {
        $now = Carbon::now('Asia/Tokyo')->format('Y_m_d-H_i_s');
        $user_id = Auth::id();
        // $user_name = Auth::user()->name;
        $image_path = $request->input('image_path');
        if ($request->file('file')) {
            $file_name = $user_id . '_' . $now . '_' . $request->file('file')->getClientOriginalName();
            $image_path = $request->file('file')->storeAs('public', $file_name);
        }

        $pen_name = $request->input('pen_name');
        $profile_text = $request->input('profile_text');
        $twitter = $request->input('twitter');
        $instagram = $request->input('instagram');
        $youtube = $request->input('youtube');
        $url = $request->input('url');

        DB::table('users')
        ->where('id', '=', $user_id)
        ->update([
            'pen_name' => $pen_name,
            'profile_text' => $profile_text,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'youtube' => $youtube,
            'url' => $url,
            'image_path' => $image_path,
        ]);
        return view('/home');
    }
    
}