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
})->middleware('auth');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::resource('/clientes', 'ClienteController');
Route::get('/clientes/destroy/{id}', 'ClienteController@destroyConfirm')->name('clientes.destroy-confirm');

Route::resource('/servicos', 'ServicoController');
Route::get('/servicos/destroy/{id}', 'ServicoController@destroyConfirm')->name('servicos.destroy-confirm');

Route::resource('/ordem-servicos', 'OrdemServicoController');

Route::get('/ordem-servicos/{id}/add-servicos', 'OrdemServicoController@addServicos')->name('ordem-servicos.add-servicos');

Route::post('/ordem-servicos/{id}/add-servicos', 'OrdemServicoController@addServicosSave')->name('ordem-servicos.add-servicos-save');

Route::get('/ordem-servicos/{id}/remove-servicos/{servico_id}', 'OrdemServicoController@removeServicos')->name('ordem-servicos.remove-servicos');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
