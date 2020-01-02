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

Route::get('users/{id}', 'UserController@show')->where('id', '[0-9]+');
Route::get('users', 'UserController@index');

Route::post('tasks', 'TaskController@store');
Route::get('tasks', 'TaskController@index');
Route::get('tasks/{id}', 'TaskController@show')->where('id', '[0-9]+');
Route::put('tasks/{id}', 'TaskController@update')->where('id', '[0-9]+');
Route::delete('tasks/{id}', 'TaskController@destroy')->where('id', '[0-9]+');
