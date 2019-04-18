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



Route::group(['middleware'=>'auth'],function(){


Route::get('/',"SuperAdmin\SuperAdminController@index")->name('index');



//users routes

Route::delete('/admin/delete-user/{id}',"SuperAdmin\UserController@deleteUser")->name('destroy_user');

Route::get('/admin/view-users',"SuperAdmin\UserController@allUsers")->name('users');

Route::get('/admin/create-user',"SuperAdmin\UserController@showCreateForm")->name('create_users');

Route::post('/admin/create-user',"SuperAdmin\UserController@storeUser")->name('store_users');


Route::get('/admin/user/{id}',"SuperAdmin\UserController@show")->name('show_user');

Route::get('/admin/user/{id}/edit',"SuperAdmin\UserController@editForm")->name('edit_user');

Route::put('/admin/user/{id}',"SuperAdmin\UserController@update")->name('update_user');










//therapist routes




Route::resource('/admin/therapist', 'SuperAdmin\TherapistController');


Route::get('/therapist/unverified-therapist','SuperAdmin\TherapistController@unVerifiedTherapist')->name('therapist.unverified');

Route::get('/therapist/verified-therapist','SuperAdmin\TherapistController@VerifiedTherapist')->name('therapist.verified');
Route::put('/therapist/verify/{id}','SuperAdmin\TherapistController@verifyTherapist')->name('therapist.verify');

//appointment routes
Route::get('/admin/appointments/{query?}',"SuperAdmin\AppointmentController@getAppointments")->name('appointments');






});

Auth::routes();

