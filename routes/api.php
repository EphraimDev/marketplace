<?php

use Illuminate\Http\Request;

Route::post('/auth/register',"API\AuthController@register");

Route::post('/auth/login',"API\AuthController@login");

Route::post('/user-details',"API\AuthController@details");

Route::get('/user/{userId}',"API\UserController@getSingleUser");


Route::middleware('auth:api')->get('/user', function (Request $request) {
    
});
