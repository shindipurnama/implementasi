<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('index');
});
*/

Route::get('/','indexController@index');
Route::get('downloadUserManual','indexController@download');


Route::get('/customer','customerController@index');
Route::get('/dataCus','customerController@dataCus');
Route::get('/addCus1','customerController@addCus1');
Route::post('cusStore1','customerController@store1');
Route::get('/addCus2','customerController@addCus2');
Route::post('cusStore2','customerController@store2');
Route::post('import_excel','customerController@storeExcel');

Route::get('konten/customer/addCus1/getstates/{id}','customerController@getStates');

Route::get('konten/customer/addCus1/kecamatan/{id}','customerController@kecamatan');

Route::get('konten/customer/addCus1/kelurahan/{id}','customerController@kelurahan');

Route::get('/barang','barangController@index');
Route::post('tambahBarang','barangController@store');
Route::get('/barcode', 'barangController@barcode');
Route::get('/cetakBarcode',  'barangController@printBarcode');
Route::get('/cetakBarcodeId/{id}','barangController@printBarcodeId');
Route::get('/scan',  'barangController@scan');
Route::get('barang/req-nama-barang/{id}','barangController@getNama');

Route::get('/location',  'locationController@index');
Route::get('/titikAwal',  'locationController@titikAwal');
Route::get('/titikKunjungan',  'locationController@titikKunjungan');
Route::post('/LocationStore', 'locationController@store');
Route::get('CetakBarcodeLokasi', 'locationController@cetak');
Route::get('/cetakBarcodeLokasiId/{id}','locationController@cetakBarcodeId');
Route::get('Toko/req-nama-toko/{id}','locationController@getNamaToko');

//scoreboard
Route::get('sse','ScoreboardController@update_sse');
Route::get('scoreboard','ScoreboardController@index');
Route::get('kontrolscoreboard','ScoreboardController@kontrol');
Route::post('store-home','ScoreboardController@store_home');
Route::post('store-away','ScoreboardController@store_away');
Route::post('store-homeplus2','ScoreboardController@scorehomeplus2');
Route::post('store-homeminus2','ScoreboardController@scorehomeminus2');
Route::post('store-homeplus3','ScoreboardController@scorehomeplus3');
Route::post('store-homeminus3','ScoreboardController@scorehomeminus3');
Route::post('store-awayplus2','ScoreboardController@scoreawayplus2');
Route::post('store-awayminus2','ScoreboardController@scoreawayminus2');
Route::post('store-awayplus3','ScoreboardController@scoreawayplus3');
Route::post('store-awayminus3','ScoreboardController@scoreawayminus3');
Route::post('store-sound1','ScoreboardController@store_sound1');
Route::post('store-sound2','ScoreboardController@store_sound2');
Route::post('store-sound3','ScoreboardController@store_sound3');
Route::post('update-sound','ScoreboardController@update_sound');
Route::post('update-menit-detik','ScoreboardController@update_menit_detik');
Route::post('reset-menit-detik','ScoreboardController@reset_menit_detik');
Route::post('resume-menit-detik','ScoreboardController@resume_menit_detik');
Route::post('stop-menit-detik','ScoreboardController@stop_menit_detik');

Route::post('store-periode','ScoreboardController@store_periode');
Route::post('store-foulshome','ScoreboardController@fouls_home');
Route::post('store-foulsaway','ScoreboardController@fouls_away');

Route::post('reset','ScoreboardController@reset');
