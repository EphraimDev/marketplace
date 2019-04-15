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

Route::post('/auth/register',"API\AuthController@register");

Route::post('/auth/login',"API\AuthController@login");

Route::post('/user-details',"API\AuthController@details");


Route::middleware('auth:api')->get('/user', function (Request $request) {
    
});
