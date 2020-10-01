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


Route::get('/customer','customerController@index');
Route::get('/dataCus','customerController@dataCus');
Route::get('/addCus1','customerController@addCus1');
Route::get('/addCus2','customerController@addCus2');

Route::get('getstates/{id}','customerController@getStates');

Route::get('customer/tambah1/kecamatan/{id}','customerController@kecamatan');

Route::get('customer/tambah1/kelurahan/{id}','customerController@kelurahan');