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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/auth/register',"API\AuthController@register");

Route::post('/auth/login',"API\AuthController@login");

Route::post('/user-details',"API\AuthController@details");

Route::get('/marketplace',"API\TherapistController@index"); 

//Route::delete('/user/{user}/leave-marketplace',"API\TherapistController@destroy"); 
