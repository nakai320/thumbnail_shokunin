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
        $user = Auth::id();
        // if(strpos($search," ")){

        //     $search=explode(" ",$search);
        //     $items=[];
        //     for ($i=0;$i<$search[$i];$i++) {

        //         $items = DB::table('uploads')
        //         ->where(
        //             'tittle', 'LIKE', '%' . $search[$i] . '%',
        //             )->orWhere('price', 'LIKE', '%' . $search[$i] . '%')
        //             ->orWhere('text', 'LIKE', '%' . $search[$i] . '%')
        //         ->orderByRaw('id DESC')
        //         ->paginate(15);
        //     }

        // }else if(strpos($search,"　")){
        //     $search =explode("　", $search);

        //     $items = DB::table('uploads')
        //         ->orwhere([
        //             ['tittle', 'LIKE', '%' . $search[0] . '%'],
        //             ['tittle', 'LIKE', '%' . $search[1] . '%']
        //         ])->orWhere([
        //             ['price', 'LIKE', '%' . $search[0] . '%'],
        //             ['price', 'LIKE', '%' . $search[1] . '%']
        //         ])->orWhere([
        //             ['text', 'LIKE', '%' . $search[0] . '%'],
        //             ['text', 'LIKE', '%' . $search[1] . '%']
        //         ])
        //         ->orderByRaw('id DESC')
        //         ->paginate(15);
        // }else{
            // dd($search);
            $items = DB::table('uploads')
        ->where('tittle', 'LIKE', '%'.$search.'%')
        ->orWhere('price', 'LIKE', '%'.$search.'%')
        ->orWhere('text', 'LIKE', '%'.$search.'%')
        ->orderByRaw('id DESC')
        // ->get();
        ->paginate(15);
        // }

        return view(
            'top',
            ['user' => $user, 'items' => $items]
        );

    }
}
        