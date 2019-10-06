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

Route::get('/')->name('pedidos.index')->uses('PedidosController@index');
Route::get('/pedidos/{id}')->name('pedidos.show')->uses('PedidosController@show')->where('id', '[0-9]+');
Route::get('/pedidos/{id}/detalhes')->name('pedidos.detalhes')->uses('PedidosController@details')->where('id', '[0-9]+');
