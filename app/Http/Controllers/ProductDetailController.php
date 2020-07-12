<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductDetailRequest;
use Illuminate\Support\Facades\Auth;
use Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    public function index ($id) {
        $item = DB::table('sell_product_infos')
        ->where('id', $id)
        ->first();

        return view('layouts.ItemDetail', [
            'item' => $item
        ]);
    }

    public function addToChart($id) {
        $item = DB::table('sell_product_infos')
        ->where('id', $id)
        ->first();

        $itemId = $item->id;

        //create insert data to databse and redirect to '/sell/item
        DB::table('profil_chart')->insert(
            ['user_id' => Auth::user()->id,
             'item_id' => $itemId ]
        );

        return redirect('/product/'.$id);

    }

}
