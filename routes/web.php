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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/filmes', 'FilmeController@index')->name('filmes.index');
Route::post('/filmes/store', 'FilmeController@store')->name('filmes.store');
Route::post('/filmes/new', 'FilmeController@new')->name('filmes.new');
Route::post('/filmes/delete', 'FilmeController@delete')->name('filmes.delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
