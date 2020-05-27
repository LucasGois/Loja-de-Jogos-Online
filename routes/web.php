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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Cidade
Route::get('/cidade/lista', 'CidadeController@lista')->name('cidade_lista');
Route::get('/cidade/cadastro/{id?}', 'CidadeController@cadastro')->name('cidade_cadastro');
Route::post('/cidade/salvar/{id?}', 'CidadeController@salvar')->name('cidade_salvar');

// Categoria
Route::get('/categoria/lista', 'CategoriaController@lista')->name('categoria_lista');
Route::get('/categoria/cadastro/{id?}', 'CategoriaController@cadastro')->name('categoria_cadastro');
Route::post('/categoria/salvar/{id?}', 'CategoriaController@salvar')->name('categoria_salvar');
