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

Route::get('/','App\Http\Controllers\GamesController@home') -> name('index');

Route::group([
    'prefix' => '/jogos',
    'as' => 'games.'
],function (){
    Route::get('/','App\Http\Controllers\GamesController@index') -> name('index');
    Route::get('/search','App\Http\Controllers\GamesController@search') -> name('search');
    Route::get('/cadastro','App\Http\Controllers\GamesController@create') -> name('create');
    Route::post('/cadastro','App\Http\Controllers\GamesController@store') -> name('store');
    Route::get('/editar/{id}','App\Http\Controllers\GamesController@edit') -> name('edit');
    Route::patch('/editar/{id}','App\Http\Controllers\GamesController@update') -> name('update');
    Route::delete('/{id}','App\Http\Controllers\GamesController@destroy') -> name('destroy');
});

Route::group([
    'prefix' => '/console',
    'as' => 'consoles.'
], function(){
    Route::get('/', 'App\Http\Controllers\ConsolesController@index') -> name('index');
    Route::get('/search', 'App\Http\Controllers\ConsolesController@search') -> name('search');
    Route::get('/cadastro', 'App\Http\Controllers\ConsolesController@create') -> name('create');
    Route::post('/cadastro', 'App\Http\Controllers\ConsolesController@store') -> name('store');
    Route::get('/editar/{id}', 'App\Http\Controllers\ConsolesController@edit') -> name('edit');
    Route::patch('/editar/{id}', 'App\Http\Controllers\ConsolesController@update') -> name('update');
    Route::delete('/{id}', 'App\Http\Controllers\ConsolesController@destroy') -> name('destroy');
});
