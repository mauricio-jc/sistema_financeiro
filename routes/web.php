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

Route::get('/', 'HomeController@index');

Route::get('/contas-receber', 'ContasReceberController@index');
Route::get('/contas-receber/adicionar', 'ContasReceberController@add');
Route::post('/contas-receber/salvar', 'ContasReceberController@store');
Route::get('/contas-receber/editar/{id}', 'ContasReceberController@edit');
Route::post('/contas-receber/atualizar/{id}', 'ContasReceberController@update');
Route::get('/contas-receber/excluir/{id}', 'ContasReceberController@delete');


Route::get('/contas-pagar', 'ContasPagarController@index');
Route::get('/contas-pagar/adicionar', 'ContasPagarController@add');
Route::post('/contas-pagar/salvar', 'ContasPagarController@store');
Route::get('/contas-pagar/editar/{id}', 'ContasPagarController@edit');
Route::post('/contas-pagar/atualizar/{id}', 'ContasPagarController@update');
Route::get('/contas-pagar/excluir/{id}', 'ContasPagarController@delete');