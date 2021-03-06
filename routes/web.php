<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Auth::routes();

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
Route::get('login', 'App\Http\Controllers\AuthController@index');
Route::post('login', 'App\Http\Controllers\AuthController@login'); 
Route::post('logout', 'App\Http\Controllers\AuthController@logout'); 

// Route::get('/login', 'App\Http\Controllers\AuthController@showFormLogin');
Route::get('/404', 'App\Http\Controllers\HomeController@notfound');
// Route::post('/actionlogin', 'App\Http\Controllers\AuthController@login');

// Route::middleware(['ceklogin'])->group(function () {
  Route::get('/', 'App\Http\Controllers\HomeController@index');

  Route::get('/barang-masuk', 'App\Http\Controllers\BarangMasukController@index');
  Route::get('/barang-masuk/search', 'App\Http\Controllers\BarangMasukController@search');
  Route::post('/barang-masuk', 'App\Http\Controllers\BarangMasukController@store');
  Route::get('/barang-masuk/create', 'App\Http\Controllers\BarangMasukController@create');
  Route::get('/barang-masuk/{id}', 'App\Http\Controllers\BarangMasukController@show');
  Route::get('/barang-masuk/{id}/edit', 'App\Http\Controllers\BarangMasukController@edit');
  Route::patch('/barang-masuk/{id}', 'App\Http\Controllers\BarangMasukController@update');
  Route::delete('/barang-masuk/{id}', 'App\Http\Controllers\BarangMasukController@destroy');

  Route::get('/barang-keluar', 'App\Http\Controllers\BarangKeluarController@index');
  Route::get('/barang-keluar/search', 'App\Http\Controllers\BarangKeluarController@search');
  Route::post('/barang-keluar', 'App\Http\Controllers\BarangKeluarController@store');
  Route::get('/barang-keluar/create', 'App\Http\Controllers\BarangKeluarController@create');
  Route::get('/barang-keluar/{id}', 'App\Http\Controllers\BarangKeluarController@show');
  Route::get('/barang-keluar/{id}/edit', 'App\Http\Controllers\BarangKeluarController@edit');
  Route::patch('/barang-keluar/{id}', 'App\Http\Controllers\BarangKeluarController@update');
  Route::delete('/barang-keluar/{id}', 'App\Http\Controllers\BarangKeluarController@destroy');

  Route::get('/kode-barang', 'App\Http\Controllers\KodeBarangController@index');
  Route::get('/kode-barang/search', 'App\Http\Controllers\KodeBarangController@search');
  Route::post('/kode-barang', 'App\Http\Controllers\KodeBarangController@store');
  Route::get('/kode-barang/create', 'App\Http\Controllers\KodeBarangController@create');
  Route::get('/kode-barang/{id}', 'App\Http\Controllers\KodeBarangController@show');
  Route::get('/kode-barang/{id}/edit', 'App\Http\Controllers\KodeBarangController@edit');
  Route::patch('/kode-barang/{id}', 'App\Http\Controllers\KodeBarangController@update');
  Route::delete('/kode-barang/{id}', 'App\Http\Controllers\KodeBarangController@destroy');

  Route::get('/stok-barang', 'App\Http\Controllers\StokBarangController@index');
  Route::get('/stok-barang/search', 'App\Http\Controllers\StokBarangController@search');
  Route::get('/stok-barang/cetak_preview', 'App\Http\Controllers\StokBarangController@cetak_preview');
  Route::get('/stok-barang/cetak_pdf', 'App\Http\Controllers\StokBarangController@cetak_pdf');
  Route::post('/stok-barang', 'App\Http\Controllers\StokBarangController@store');
  Route::get('/stok-barang/create', 'App\Http\Controllers\StokBarangController@create');
  Route::get('/stok-barang/{id}', 'App\Http\Controllers\StokBarangController@show');
  Route::get('/stok-barang/{id}/edit', 'App\Http\Controllers\StokBarangController@edit');
  Route::patch('/stok-barang/{id}', 'App\Http\Controllers\StokBarangController@update');
  Route::delete('/stok-barang/{id}', 'App\Http\Controllers\StokBarangController@destroy');

  Route::get('/kategori', 'App\Http\Controllers\CategoryController@index');
  Route::get('/kategori/search', 'App\Http\Controllers\CategoryController@search');
  Route::post('/kategori', 'App\Http\Controllers\CategoryController@store');
  Route::get('/kategori/create', 'App\Http\Controllers\CategoryController@create');
  Route::get('/kategori/{id}', 'App\Http\Controllers\CategoryController@show');
  Route::get('/kategori/{id}/edit', 'App\Http\Controllers\CategoryController@edit');
  Route::patch('/kategori/{id}', 'App\Http\Controllers\CategoryController@update');
  Route::delete('/kategori/{id}', 'App\Http\Controllers\CategoryController@destroy');

  Route::get('/user-management', 'App\Http\Controllers\UserController@index');
  Route::post('/user-management', 'App\Http\Controllers\UserController@store');
  Route::get('/user-management/create', 'App\Http\Controllers\UserController@create');
  Route::get('/user-management/{id}', 'App\Http\Controllers\UserController@show');
  Route::get('/user-management/{id}/edit', 'App\Http\Controllers\UserController@edit');
  Route::patch('/user-management/{id}', 'App\Http\Controllers\UserController@update');
  Route::delete('/user-management/{id}', 'App\Http\Controllers\UserController@destroy');

// });
