<?php

use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\GamesController;
//Importa a classe para usar route resource

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
    return view('index');
})->name('index');

//Route::resource('games',GamesController::class);
//Perguntar para Luan vantagens e desvantagens entre resource e definir as rotas explicitamente

Route::group([
    'prefix' => '/jogos',
    'as' => 'games.'
],function (){
    Route::get('/','App\Http\Controllers\GamesController@index') -> name('index');
    Route::get('/cadastro','App\Http\Controllers\GamesController@create') -> name('create');
    Route::post('/cadastro','App\Http\Controllers\GamesController@store') -> name('store');
    Route::get('/editar/{id}','App\Http\Controllers\GamesController@edit') -> name('edit');
    Route::patch('/editar/{id}','App\Http\Controllers\GamesControler@update') -> name('update');
    Route::delete('/','App\Http\Controllers\GamesController@destroy') -> name('destroy');
});
