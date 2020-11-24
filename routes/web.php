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

Route::get('/', function () {
    return redirect('/home');
});

// Route Product
Route::get('/produk', 'AppController@produk');
Route::get('/produk/tambah', 'AppController@tambah');
Route::post('/produk/saveproduk', 'AppController@saveproduk');
Route::get('produk/edit/{id}', 'AppController@edit');
Route::post('/produk/editproduk/{id}', 'AppController@editproduk');
Route::get('/produk/delete/{id}', 'AppController@delete');
Route::get('/produk/view/{id}', 'AppController@view');
Route::get('/produk/cari', 'AppController@search');

// Route Top Up
Route::get('/topup', 'AppController@topup');
Route::post('/topup/save', 'AppController@topupsave');
Route::get('/topup/history', 'AppController@topuphistory');

// Route Pay
Route::get('pay/{id}', 'AppController@pay');
Route::post('pay/save/{id}', 'AppController@paysave');

// Auth Route
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

