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

Route::get('/', 'BlogController@index');
Route::get('/blog/{id}', 'BlogController@show');
Route::post('/blog/komentar/store', 'BlogController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('artikel', 'ArtikelController');
Route::resource('komentar', 'KomentarController');
Route::resource('artikel.komentar', 'KomentarController');