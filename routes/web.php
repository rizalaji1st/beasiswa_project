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

Route::get('/adminuniversitas','AdminunivController@index');
Route::get('/adminuniversitas/create','AdminunivController@create');
Route::get('/adminuniversitas/{adminuniv}','AdminunivController@show');
Route::post('/adminuniversitas','AdminunivController@store');