<?php

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

Route::get('/register_api/{key}/{username}','sessionController@register');
Route::get('/activate/{key}','sessionController@activate');
Route::get('/get/{id}','sessionController@get');
