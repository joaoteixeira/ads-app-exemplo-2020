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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('/clientes', 'ClienteController');
Route::get('/clientes/destroy/{id}', 'ClienteController@destroyConfirm')->name('clientes.destroy-confirm');

Route::resource('/servicos', 'ServicoController');
Route::get('/servicos/destroy/{id}', 'ServicoController@destroyConfirm')->name('servicos.destroy-confirm');
