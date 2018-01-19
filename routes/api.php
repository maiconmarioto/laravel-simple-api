<?php

use Illuminate\Http\Request;

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

Route::get('/user/{id?}', 'UserController@get');
Route::post('/user', 'UserController@create');
Route::patch('/user/{id}', 'UserController@update');
Route::delete('/user/{id}', 'UserController@delete');