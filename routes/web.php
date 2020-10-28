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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::namespace('Admin')
        ->prefix('admin')
        ->name('admin.')
        ->middleware('can:manage-users')
        ->group(function(){
            Route::resource('/users', 'UserController', ['except' => ['store','show', 'create']]);
            Route::resource('/penawarans', 'Adminuniversitas\PenawaranController');
            
});


//Route::get('/adminuniversitas/penetapan/pnominasi_index','AdminunivPNominasiController@index');
Route::get('/pendaftaran', 'PendaftaranController@index');
Route::get('/pendaftaran/{adminuniv}', 'PendaftaranController@create');

//nominasi ranking

Route::get('/nrangkings', 'NrangkingsController@index');
Route::get('/pnominasis', 'PNominasisController@index');
Route::get('/pengusulans', 'PengusulansController@index');

Route::get('/nrangking/{nrangking}', 'NrangkingsController@show');
//Route::get('/nrangkings', 'NrangkingsController@index');
Route::get('/nrangkings/export_excel', 'NrangkingsController@export_excel');
Route::post('/pnominasis/import_excel', 'PNominasisController@import_excel');


Route::get('/', 'PendaftaranController@index');

Route::get('/{adminuniv}', 'PendaftaranController@create');
Route::post('/', 'PendaftaranController@store');
Route::get('/detail/{adminuniv}', 'PendaftaranController@detail');
Route::get('/daftar/{adminuniv}', 'PendaftaranController@daftar');