<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/adminuniversitas', 'AdminunivController@index');
//Route::get('/adminuniversitas', 'AdminunivPNominasiController@index');
Route::post('/adminuniversitas', 'AdminunivController@store');
//Route::get('/adminuniversitas/penetapan/kriteria','AdminunivpenetapanController@index');
Route::get('/adminuniversitas/create', 'AdminunivController@create');
Route::get('/adminuniversitas/{adminuniv}', 'AdminunivController@show');
Route::patch('/adminuniversitas/{adminuniv}', 'AdminunivController@update');
Route::put('/adminuniversitas/{adminuniv}', 'AdminunivController@edit');
Route::delete('/adminuniversitas/{adminuniv}', 'AdminunivController@destroy');
<<<<<<< HEAD
=======

//Route::get('/adminuniversitas/penetapan/pnominasi_index','AdminunivPNominasiController@index');
Route::get('/pendaftaran', 'PendaftaranController@index');
Route::post('/adminuniversitas', 'AdminunivController@store');
Route::get('/pendaftaran/{adminuniv}', 'PendaftaranController@create');



//nominasi ranking

Route::get('/nrangkings', 'NrangkingsController@index');
Route::get('/nrangking/{nrangking}', 'NrangkingsController@show');

//Route::get('/article', 'WebController@index');

Route::post('/adminuniversitas', 'AdminunivController@store');
>>>>>>> 5bff68317663f6d369d2557e5fa84c02f3fdea3d

Route::get('/', 'PendaftaranController@index');

Route::get('/{adminuniv}', 'PendaftaranController@create');

Route::get('/detail/{adminuniv}', 'PendaftaranController@detail');
Route::get('/daftar/{adminuniv}', 'PendaftaranController@daftar');

