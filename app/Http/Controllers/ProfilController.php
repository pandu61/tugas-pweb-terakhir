<?php

namespace App\Http\Controllers;

//use Request;
use App\User;
use App\Http\Requests\ProfilEditRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\HttpCache\Store;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('login');
    }

    public function index () {
        return view('layouts.ProfilIndex');
    }

    public function edit() {

        return view('layouts.ProfilEdit');
    }

    public function update(Request $request) {

        $data = $request->all();

        if (isset($data['avatar'])) {
            $isImg = explode(".",  $data['avatar']);

            if ($isImg[sizeof($isImg)-1] == "png" ||
            $isImg[sizeof($isImg)-1] == "jpg" ||
            $isImg[sizeof($isImg)-1] == "jpeg" ||
            $isImg[sizeof($isImg)-1] == "svg"  ) {

                $path = $request->file($data['avatar'])->store('/public/assets/profil-img/'.Auth::user()->id.'/');

                $itemss =DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                    'email' => $data['email'],
                    'name' => $data['name'],
                    'img_url' => $data['avatar']
                ]);
            }else {
                    return redirect('/profile/');
            }

            $item = user::findOrFail(Auth::user()->id);
            $item->update($data);

            return redirect('/');
            }

            $itemss =DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'email' => $data['email'],
                'name' => $data['name']
            ]);

            return redirect('/sell/');
        }


    public function profilChart () {

        $items = DB::table('sell_product_infos')
        ->join('profil_chart', 'profil_chart.item_id',
           '=', 'sell_product_infos.id')
        ->select('id', 'product_name', 'seller_id', 'location', 'price')
        ->where('profil_chart.user_id', Auth::user()->id )
        ->get();


        return view('layouts.ProfilChart', [
            'items' => $items
        ]);

    }

    public function removeChart ($id) {

        $items =DB::table('profil_chart')
        ->where('item_id', $id)
        ->where('user_id', Auth::user()->id)
        ->delete();

        redirect('/profil/chart/' );

    }

    public function profilBought () {
        return view('layouts.ProfilBought');
    }
}
