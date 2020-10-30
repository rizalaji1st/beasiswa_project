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

Route::get('/adminuniversitas', 'AdminunivController@index');
Route::get('/adminuniversitas/create', 'AdminunivController@create');
Route::post('/adminuniversitas', 'AdminunivController@store');
Route::get('/adminuniversitas/{adminuniv}', 'AdminunivController@show');
Route::patch('/adminuniversitas/{adminuniv}', 'AdminunivController@update');
Route::put('/adminuniversitas/{adminuniv}', 'AdminunivController@edit');
Route::delete('/adminuniversitas/{adminuniv}', 'AdminunivController@destroy');


//Route::get('/adminuniversitas/penetapan/pnominasi_index','AdminunivPNominasiController@index');
Route::get('/pendaftaran', 'PendaftaranController@index');
Route::post('/adminuniversitas', 'AdminunivController@store');
Route::get('/pendaftaran/{adminuniv}', 'PendaftaranController@create');

//monitoring
Route::get('/dashboard', 'DataController@dashboard');
Route::get('/data_mhs/{nrangking}', 'DataController@index');
Route::get('/nrangking/cetak_pdf', 'DataController@cetak_pdf');
Route::get('/hasil_mhs', 'DataController@show');
Route::get('/dashboard_hasil', 'DataController@dashboard_hasil');





//Route::get('/article', 'WebController@index');

Route::post('/adminuniversitas', 'AdminunivController@store');

Route::get('/', 'PendaftaranController@index');

Route::get('/{adminuniv}', 'PendaftaranController@create');
Route::post('/', 'PendaftaranController@store');
Route::get('/detail/{adminuniv}/', 'PendaftaranController@detail');
Route::get('/daftar/{adminuniv}/', 'PendaftaranController@daftar');
