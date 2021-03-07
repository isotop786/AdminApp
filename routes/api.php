<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// user routes

// Route::get('users','UserController@index');
// Route::get('users/{id}','UserController@show');
// Route::post('users/create','UserController@store');
// Route::put('users/{id}','UserController@update');
// Route::delete('users/{id}','UserController@destroy');



//user's route
Route::group(['middleware'=>'auth:api'],function(){
    Route::apiResource('users','UserController');
    Route::get('user','UserController@user');
    Route::put('updateinfo','UserController@updateInfo');
    Route::put('user/password','UserController@passwordReset');
});

// login route
Route::post('login','AuthController@login');
Route::post('register','AuthController@register');

