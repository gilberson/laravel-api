<?php

use Illuminate\Http\Request;
// use Illuminate\Routing\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('task', 'TaskController@index');
Route::post('store', 'TaskController@store');
Route::post('delete/{id}', 'TaskController@destroy')->where('id', '[0-9]+');
Route::get('task/{id}', 'TaskController@show')->where('id', '[0-9]+');
