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
Route::delete('/filmes/delete', 'FilmeController@delete')->name('filmes.delete');
Route::get('/filmes/edit/{id}', 'FilmeController@edit')->name('filmes.edit');
Route::put('/filmes/update', 'FilmeController@update')->name('filmes.update');

Auth::routes();

Route::get('/clientes', 'ClienteController@index')->name('clientes.index');
Route::post('/clientes/store', 'ClienteController@store')->name('clientes.store');
Route::get('/clientes/new', 'ClienteController@new')->name('clientes.new');
Route::delete('/clientes/delete', 'ClienteController@delete')->name('clientes.delete');
Route::get('/clientes/edit/{id}', 'ClienteController@edit')->name('clientes.edit');
Route::put('/clientes/update', 'ClienteController@update')->name('clientes.update');

Auth::routes();

Route::get('/alugueis', 'AluguelController@index')->name('alugueis.index');
Route::post('/alugueis/store', 'AluguelController@store')->name('alugueis.store');
Route::get('/alugueis/new', 'AluguelController@new')->name('alugueis.new');
Route::delete('/alugueis/delete', 'AluguelController@delete')->name('alugueis.delete');
Route::get('/alugueis/edit/{id}', 'AluguelController@edit')->name('alugueis.edit');
Route::put('/alugueis/update', 'AluguelController@update')->name('alugueis.update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
