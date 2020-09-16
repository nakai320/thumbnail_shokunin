<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; 

class SearchController extends Controller
{
    //
    public function search(Request $request){
        $search = $request->search;
        if(!isset($search))
        $user = Auth::id();
        $items = DB::table('uploads')
        ->where('tittle','LIKE','%'.$search.'%')
        ->orWhere('price', 'LIKE', '%'.$search.'%')
        ->orWhere('text','LIKE','%'.$search.'%')
        ->orderByRaw('id DESC')
        // ->get();
        ->paginate(15);

        




        return view(
            'top',
            ['user' => $user, 'items' => $items]
        );

    }
}
        