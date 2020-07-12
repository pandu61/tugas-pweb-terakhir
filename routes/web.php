<?php

use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
//home route
Auth::routes();
Route::get('/','HomeController@index');


//logout route
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

//route profil
Route::get('/profil/', 'ProfilController@index')->name('profil');
Route::get('/profil/chart/', 'ProfilController@profilChart')->name('profilchart');
Route::get('/profil/bought/', 'ProfilController@profilBought')->name('profilbought');
Route::get('profil/edit/', 'ProfilController@edit');
Route::get('/profil/update/', 'ProfilController@update');

//routet sell
Route::get('/sell/pass/{req}', 'SellController@folloUpPass');
Route::get('sell/cancel/{req}', 'SellController@followUpCancel' );
Route::get('/sell/item/', 'SellController@sellItem');
Route::resource('sell', 'SellController');

//route search result
Route::get('/result/'  , 'ResultController@searchByName')->name('result');
Route::get('/result/nameandcategory/', 'ResultController@searchByNameAndCategory');
Route::get('/result/category/{category}', 'ResultController@searchByCategoryUsingUrl');

//route produck detail
Route::get('/product/{id}','ProductDetailController@index')->name('produckdetail');
Route::post('/addToChart/{id}', 'ProductDetailController@addToChart');
Route::get('/removeChart/{id}', 'ProfilController@removeChart');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);
