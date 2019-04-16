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
Route::post('/auth/register','Api\AuthController@register');
Route::post('/auth/signup','Api\AuthController@register');
Route::post('/auth/login','Api\AuthController@login');
Route::post('/user-details','Api\AuthController@details');
Route::post('/auth/signup/therapist', 'API\TherapistController@store');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace'=>'api', 'middleware'=>'auth:api'], function(){
    # this is commented out because theres change in therapist schema
    # whuich would cause the method to fail
   # Route::get('/user/{userId}',"UserController@getSingleUser");
    Route::get('/user/{userId}', 'UserController@fetchProfile');
    Route::get('therapist/{therapistId}', 'TherapistController@fetchProfile');
    Route::get('/marketplace', "TherapistController@index");
});
