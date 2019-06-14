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
Route::get('/filmes/new', 'FilmeController@new')->name('filmes.new');
Route::post('/filmes/delete', 'FilmeController@delete')->name('filmes.delete');

Auth::routes();

Route::get('/clientes', 'ClienteController@index')->name('clientes.index');
Route::post('/clientes/store', 'ClienteController@store')->name('clientes.store');
Route::get('/clientes/new', 'ClienteController@new')->name('clientes.new');
Route::post('/clientes/delete', 'ClienteController@delete')->name('clientes.delete');

Auth::routes();

Route::get('/alugueis', 'AluguelController@index')->name('alugueis.index');
Route::post('/alugueis/store', 'AluguelController@store')->name('alugueis.store');
Route::get('/alugueis/new', 'AluguelController@new')->name('alugueis.new');
Route::post('/alugueis/delete', 'AluguelController@delete')->name('alugueis.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
