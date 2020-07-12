<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function searchByName(Request $request) {
        $name = $request::all();

        $items = DB::table('sell_product_infos')
        ->whereRaw('product_name regexp "'.$name['search'].'"')
        ->paginate(15);


        return view('layouts.Result', [
            'items' => $items
            ]);
    }

    public function searchByNameAndCategory (Request $request) {
        $req = $request::all();

        $items = DB::table('sell_product_infos')
        ->whereRaw('product_name regexp "'.$req['name'].'"')
        ->whereRaw('category regexp "'.$req['category'].'"')
        ->paginate(15);


        return view('layouts.Result', [
            'items' => $items
            ]);
    }

    public function searchByCategoryUsingUrl ($category) {
        $items = DB::table('sell_product_infos')
        ->whereRaw('category regexp "'.$category.'"')
        ->paginate(15);

        return view('layouts.Result', [
            'items' => $items
            ]);
    }


}
