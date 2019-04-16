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
Route::post('/auth/register',"API\AuthController@register");


Route::post('/auth/logout',"API\AuthController@logout");



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Every operation that requires the user to be logged in before they can perform them
 * has being moved to this group
 * so the authentication bearer token has to be in the header of the request
 * */

Route::group(['namespace'=>'api', 'middleware'=>'auth:api'], function(){

    # this is commented out because theres change in therapist schema
    # whuich would cause the method to fail
   # Route::get('/user/{userId}',"UserController@getSingleUser");
    Route::get('/user/{userId}', 'UserController@fetchProfile');
    Route::get('therapist/{therapistId}', 'TherapistController@fetchProfile');
    Route::get('/marketplace', "TherapistController@index");

    Route::get('/user-details',"AuthController@details");  //this was not requested for
   // Route::get('/user/{userId}',"API\UserController@getSingleUser");
    Route::post('/search/{name}',"TherapistController@search"); // i just fixed this
    Route::delete('/therapist/{therapistId}/leave-marketplace',"TherapistController@destroy");
    Route::put('/therapist/{therapistId}/status',"TherapistController@changeStatus");
    Route::get('/all-therapist',"TherapistController@getAllTherapist");
});
