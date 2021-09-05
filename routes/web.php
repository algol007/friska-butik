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

Route::get('/login', 'App\Http\Controllers\AuthController@index');

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/404', 'App\Http\Controllers\HomeController@notfound');

Route::get('/user', 'App\Http\Controllers\UserController@index');

Route::get('/barang-masuk', 'App\Http\Controllers\BarangMasukController@index');

Route::get('/barang-keluar', 'App\Http\Controllers\BarangKeluarController@index');

Route::get('/kode-barang', 'App\Http\Controllers\KodeBarangController@index');

Route::get('/stok-barang', 'App\Http\Controllers\StokBarangController@index');

Route::get('/kategori', 'App\Http\Controllers\CategoryController@index');
