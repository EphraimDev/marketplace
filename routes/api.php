<?php

use Illuminate\Http\Request;

Route::post('/auth/register',"API\AuthController@register");

Route::post('/auth/login',"API\AuthController@login");

Route::post('/auth/logout',"API\AuthController@logout");

Route::get('/user-details',"API\AuthController@details");  //this was not requested for 

Route::get('/marketplace', "API\TherapistController@index");

Route::get('/user/{userId}',"API\UserController@getSingleUser");


Route::post('/search/{name}',"API\TherapistController@search"); // i just fixed this


Route::delete('/user/{user}/leave-marketplace',"API\TherapistController@destroy"); 


Route::put('/user/{userId}/status',"API\TherapistController@changeStatus");

Route::get('/all-therapist',"API\TherapistController@getAllTherapist");

Route::middleware('auth:api')->get('/user', function (Request $request) {
    
});
