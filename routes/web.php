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
            Route::resource('/verifikasi', 'Adminuniversitas\VerifikasiController');
            Route::resource('/lampiran-penawaran', 'Adminuniversitas\LampiranPenawaranController');
            // Route::put('/verifikasi/{id_pendaftar}', 'Adminuniversitas\VerifikasiController@verify');
            Route::resource('/nominasi', 'Adminuniversitas\NominasiController');
            Route::get('/nominasi/detail_skor/{id}', 'Adminuniversitas\NominasiController@detail_skor')->name('detail_skor');
            //Route::get('/cetak_excel/{nominasi}', 'Adminuniversitas\NominasiController@export_excel')->name('export_excel');
            Route::get('/cetak_excel', 'Adminuniversitas\NominasiController@export_excel')->name('export_excel');
            Route::resource('/penetapan', 'Adminuniversitas\PenetapanController');
            Route::post('/import_excel', 'Adminuniversitas\PenetapanController@import_excel')->name('import_excel');
});



//Route::get('/adminuniversitas/penetapan/pnominasi_index','AdminunivPNominasiController@index');
Route::get('/pendaftaran', 'PendaftaranController@index')->middleware('can:manage-users');
Route::get('/pendaftaran/{adminuniv}', 'PendaftaranController@create');

//monitoring
// Route::get('/admin/nominasi/{$nominasi}', 'NominasiController@index');
// Route::get('/admin/nominasi/show', 'NominasiController@show');
// Route::get('/admin/nominasi', 'NominasiController@detail_skor');

Route::get('/data_mhs/{nrangking}', 'DataController@index');
Route::get('/nrangking/cetak_pdf', 'DataController@cetak_pdf');
Route::get('/hasil_mhs', 'DataController@show');
Route::get('/dashboard_hasil', 'DataController@dashboard_hasil');



//pendaftaran-rendi dahsboard
Route::get('/pendaftar', 'PendaftarDashController@index');
Route::get('/', 'PendaftarDashController@penawaranIndex');
Route::get('/pendaftar/penawaran/detail/{penawaran}', 'PendaftarDashController@penawaranDetail');
Route::get('/pendaftar/penawaran/daftar/{penawaran}', 'PendaftarDashController@penawaranDaftar');
Route::get('/pendaftar/penawaran/upload/{penawaran}', 'PendaftarDashController@penawaranUpload');
Route::post('/pendaftar/penawaran/upload/{penawaran}', 'PendaftarDashController@penawaranCreate')->name('pendaftar_upload');
Route::get('/pendaftar/penawaran/print/{penawaran}', 'PendaftarDashController@cetakPdf');
Route::get('/pendaftar/pengumuman', 'PendaftarDashController@indexPengumuman');

//

Route::get('/{adminuniv}', 'PendaftaranController@create');
Route::post('/', 'PendaftaranController@store');
Route::get('/detail/{penawaran}', 'PendaftaranController@detail');
Route::get('/daftar/{penawaran}', 'PendaftaranController@daftar');
