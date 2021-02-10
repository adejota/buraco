<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function() {
    Route::patch('/user/{user}', 'App\Http\Controllers\UserController@update');

    Route::get('/matches', 'App\Http\Controllers\MatchesController@index');
    Route::post('/matches', 'App\Http\Controllers\MatchesController@store');
    Route::get('/matches/{match}', 'App\Http\Controllers\MatchesController@show');
    Route::patch('/matches/{match}', 'App\Http\Controllers\MatchesController@update');
    Route::delete('/matches/{match}', 'App\Http\Controllers\MatchesController@destroy');

    Route::get('/opponents', 'App\Http\Controllers\OpponentsController@index');
    Route::post('/opponents', 'App\Http\Controllers\OpponentsController@store');
    Route::get('/opponents/{opponent}', 'App\Http\Controllers\OpponentsController@show');
    Route::patch('/opponents/{opponent}', 'App\Http\Controllers\OpponentsController@update');
    Route::delete('/opponents/{opponent}', 'App\Http\Controllers\OpponentsController@destroy');

    Route::get('/matchscores', 'App\Http\Controllers\MatchScoresController@index');
    Route::post('/matchscores', 'App\Http\Controllers\MatchScoresController@store');
    Route::get('/matchscores/{matchscore}', 'App\Http\Controllers\MatchScoresController@show');
    Route::patch('/matchscores/{matchscore}', 'App\Http\Controllers\MatchScoresController@update');
    Route::delete('/matchscores/{matchscore}', 'App\Http\Controllers\MatchScoresController@destroy');
    Route::get('/matchscores/matchscores/{match_id}', 'App\Http\Controllers\MatchScoresController@matchIdIndex');
});



