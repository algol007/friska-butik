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

// Route::get('/', 'PagesController@home');
// Route::get('/about', 'PagesController@about');

Route::group(['middleware' => ['web']], function () {

  Route::get('barang-masuk', 'App\Http\Controllers\BarangMasukController@index');
  Route::post('barang-masuk', 'App\Http\Controllers\BarangMasukController@store');
  Route::get('barang-masuk/create', 'App\Http\Controllers\BarangMasukController@create');
  Route::get('barang-masuk/{id}', 'App\Http\Controllers\BarangMasukController@show');
  Route::get('barang-masuk/{id}/edit', 'App\Http\Controllers\BarangMasukController@edit');
  Route::patch('barang-masuk/{id}', 'App\Http\Controllers\BarangMasukController@update');
  Route::delete('barang-masuk/{id}', 'App\Http\Controllers\BarangMasukController@destroy');

  Route::get('/barang-keluar', 'App\Http\Controllers\BarangKeluarController@index');
  Route::post('/barang-keluar', 'App\Http\Controllers\BarangKeluarController@store');
  Route::get('/barang-keluar/create', 'App\Http\Controllers\BarangKeluarController@create');
  Route::get('/barang-keluar/{id}', 'App\Http\Controllers\BarangKeluarController@show');
  Route::get('/barang-keluar/{id}/edit', 'App\Http\Controllers\BarangKeluarController@edit');
  Route::patch('/barang-keluar/{id}', 'App\Http\Controllers\BarangKeluarController@update');
  Route::delete('/barang-keluar/{id}', 'App\Http\Controllers\BarangKeluarController@destroy');

  Route::get('/kode-barang', 'App\Http\Controllers\KodeBarangController@index');
  Route::post('/kode-barang', 'App\Http\Controllers\KodeBarangController@store');
  Route::get('/kode-barang/create', 'App\Http\Controllers\KodeBarangController@create');
  Route::get('/kode-barang/{id}', 'App\Http\Controllers\KodeBarangController@show');
  Route::get('/kode-barang/{id}/edit', 'App\Http\Controllers\KodeBarangController@edit');
  Route::patch('/kode-barang/{id}', 'App\Http\Controllers\KodeBarangController@update');
  Route::delete('/kode-barang/{id}', 'App\Http\Controllers\KodeBarangController@destroy');

  Route::get('/stok-barang', 'App\Http\Controllers\StokBarangController@index');
  Route::post('/stok-barang', 'App\Http\Controllers\StokBarangController@store');
  Route::get('/stok-barang/create', 'App\Http\Controllers\StokBarangController@create');
  Route::get('/stok-barang/{id}', 'App\Http\Controllers\StokBarangController@show');
  Route::get('/stok-barang/{id}/edit', 'App\Http\Controllers\StokBarangController@edit');
  Route::patch('/stok-barang/{id}', 'App\Http\Controllers\StokBarangController@update');
  Route::delete('/stok-barang/{id}', 'App\Http\Controllers\StokBarangController@destroy');

  Route::get('/kategori', 'App\Http\Controllers\CategoryController@index');
  Route::post('/kategori', 'App\Http\Controllers\CategoryController@store');
  Route::get('/kategori/create', 'App\Http\Controllers\CategoryController@create');
  Route::get('/kategori/{id}', 'App\Http\Controllers\CategoryController@show');
  Route::get('/kategori/{id}/edit', 'App\Http\Controllers\CategoryController@edit');
  Route::patch('/kategori/{id}', 'App\Http\Controllers\CategoryController@update');
  Route::delete('/kategori/{id}', 'App\Http\Controllers\CategoryController@destroy');

  Route::get('/user', 'App\Http\Controllers\UserController@index');
  Route::post('/user', 'App\Http\Controllers\UserController@store');
  Route::get('/user/create', 'App\Http\Controllers\UserController@create');
  Route::get('/user/{id}', 'App\Http\Controllers\UserController@show');
  Route::get('/user/{id}/edit', 'App\Http\Controllers\UserController@edit');
  Route::patch('/user/{id}', 'App\Http\Controllers\UserController@update');
  Route::delete('/user/{id}', 'App\Http\Controllers\UserController@destroy');

});
