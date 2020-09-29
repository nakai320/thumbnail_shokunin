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

        // 複数ワード検索
        // if (strpos($search, " ")) {
        //     $search=explode(" ", $search);
        //     $items = DB::table('uploads')
        //   ->orWhere(function ($query) use ($search) {
        //       foreach ($search as $search) {
        //         $query->orWhere('tittle', 'LIKE', '%'.$search.'%');
        //       }
        //   }) ->orderByRaw('id DESC')
        //             ->paginate(15);

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
        // }

        // 単数ワード検索
            $items = DB::table('uploads')
        ->where('tittle', 'LIKE', '%'.$search.'%')
        ->orWhere('price', 'LIKE', '%'.$search.'%')
        ->orWhere('text', 'LIKE', '%'.$search.'%')
        ->orderByRaw('id DESC')
        ->paginate(15);

        return view(
            'top',
            ['user' => $user, 'items' => $items]
        );

    }
}
        