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
Route::post('/auth/register','AuthController@register');
Route::post('/auth/signup','AuthController@register');
Route::post('/auth/login','AuthController@login');
Route::post('/user-details','AuthController@details');
Route::post('/auth/signup/therapist', 'API\TherapistController@store');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace'=>'api', 'middleware'=>'auth:api'], function(){
    Route::get('/user/{userId}',"UserController@getSingleUser");
    Route::get('/user/{user}', 'UserController@fetchUser');
    Route::get('/marketplace', "TherapistController@index");
});
