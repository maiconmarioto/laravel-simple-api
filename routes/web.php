<?php


Route::get('/user/{id?}', 'UserController@get');
Route::post('/user', 'UserController@create');
Route::patch('/user/{id?}', 'UserController@update');
Route::delete('/user/{id?}', 'UserController@delete');