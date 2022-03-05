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
    return view('index');
})->name('index');

Route::group([
    'prefix' => '/jogos',
    'as' => 'games.'
],function (){
    Route::get('/','App\Http\Controllers\GamesController@index') -> name('index');
    Route::get('/cadastro','App\Http\Controllers\GamesController@create') -> name('create');
    Route::post('/cadastro','App\Http\Controllers\GamesController@store') -> name('store');
});
