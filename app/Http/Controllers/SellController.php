<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellProductInfoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\SellProductInfo;
use Illuminate\Support\Facades\DB;
use SellProductInfos;

class SellController extends Controller
{
    public function __construct()   {
        $this->middleware('login');
    }

    public function index () {
        $items1 = DB::table('sell_bought_item')
        ->join('sell_product_infos',
        'sell_product_infos.id', '=','sell_bought_item.item_id')
        ->where('sell_bought_item.seller_id', Auth::user()->id)
        ->get();

        return view('layouts.SellIndex', [
            'items' => $items1
        ]);
    }

    public function followUpPass ($req) {
        $data = DB::table('sell_bought_item')
        ->where('seller_id', Auth::user()->id)
        ->where('item_id', $req)
        ->whereNotExists('follow_up', 'cancel')
        ->update(['follow_up', 'passed on']);

        return redirect()->route('sell.index');
    }

    public function followUpCancel ($req) {
        $data = DB::table('sell_bought_item')
        ->where('seller_id', Auth::user()->id)
        ->where('item_id', $req)
        ->whereNotExists('follow_up', 'cancel')
        ->update(['follow_up', 'passed on']);

        return redirect()->route('sell.index');
    }

    public function Edit($id) {
        $item = DB::table('sell_product_infos')
        ->where('id', $id)
        ->where('seller_id', Auth::user()->id)
        ->first();

        return view('layouts.SellEdit',[
            'item' => $item
            ]);
        //  var_dump($item);
    }

    public function create () {
        return view('layouts.SellCreate');
    }

    public function sellItem () {

        $items = DB::table('sell_product_infos')
        ->where('seller_id', Auth::user()->id)
        ->orderBy('product_name')
        ->get();

        return view('layouts.SellItem', [
            'items' => $items
        ]);
    }

    public function destroy($id) {
        $items = DB::table('sell_product_infos')
        ->where('id', $id)
        ->where('seller_id', Auth::user()->id)
        ->delete();

        return redirect('/sell/item');
    }

    public function store(SellProductInfoRequest $request) {//function for create data product for sale
        //get data from user and seller id
        $data = $request-> all();
        $data['seller_id'] = Auth::user()->id;

        //create insert data to databse and redirect to '/sell/item
        SellProductInfo::create($data);
        return redirect('/sell/item');
    }

    public function update (SellProductInfoRequest $request, $id) {
        $data = $request-> all();
        unset($data['_token']);
        unset($data['_method']);

        $item = DB::table('sell_product_infos')
        ->where('id', $id)
        ->where('seller_id', Auth::user()->id)
        ->update($data);

        return redirect('/sell/item/');
    }

    public function transaction () {
        
    }
}
