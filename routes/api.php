<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// user routes

Route::get('users','UserController@index');
Route::get('users/{id}','UserController@show');
Route::post('users/create','UserController@store');
Route::put('users/{id}','UserController@update');
Route::delete('users/{id}','UserController@destroy');

