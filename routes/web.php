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

/*Rotas para filmes*/

Route::get('/filmes', 'FilmesController@index')->name('filmes.index');
Route::get('/filmes', 'FilmesController@create')->name('filmes.create');
Route::post('/filmes', 'FilmesController@store')->name('filmes.store');
Route::get('/filmes/{id}', 'FilmesController@show')->name('filmes.show');
Route::get('/filmes/{id}', 'FilmesController@show')->name('filmes.show');
Route::get('/filmes/{id}', 'FilmesController@edit')->name('filmes.edit');
Route::put('/filmes/{id}', 'FilmesController@update')->name('filmes.update');
Route::delete('/filmes/{id}', 'FilmesController@destroy')->name('filmes.destroy');

/*Rotas para clientes*/

Route::get('/clientes', 'ClientesController@index')->name('clientes.index');
Route::get('/clientes', 'ClientesController@create')->name('clientes.create');
Route::post('/clientes', 'ClientesController@store')->name('clientes.store');
Route::get('/clientes/{id}', 'ClientesController@show')->name('clientes.show');
Route::get('/clientes/{id}', 'ClientesController@show')->name('clientes.show');
Route::get('/clientes/{id}', 'ClientesController@edit')->name('clientes.edit');
Route::put('/clientes/{id}', 'ClientesController@update')->name('clientes.update');
Route::delete('/clientes/{id}', 'ClientesController@destroy')->name('clientes.destroy');

/*Rotas para alugueis*/

Route::get('/alugueis', 'AlugueisController@index')->name('alugueis.index');
Route::get('/alugueis', 'AlugueisController@create')->name('alugueis.create');
Route::post('/alugueis', 'AlugueisController@store')->name('alugueis.store');
Route::get('/alugueis/{id}', 'AlugueisController@show')->name('alugueis.show');
Route::get('/alugueis/{id}', 'AlugueisController@show')->name('alugueis.show');
Route::get('/alugueis/{id}', 'AlugueisController@edit')->name('alugueis.edit');
Route::put('/alugueis/{id}', 'AlugueisController@update')->name('alugueis.update');
Route::delete('/alugueis/{id}', 'AlugueisController@destroy')->name('alugueis.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
