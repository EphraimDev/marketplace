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




Route::get('/',"SuperAdmin\SuperAdminController@index")->name('index');



//users routes

Route::delete('/admin/delete-user/{id}',"SuperAdmin\UserController@deleteUser")->name('destroy_user');

Route::get('/admin/view-users',"SuperAdmin\UserController@allUsers")->name('users');

Route::get('/admin/create-user',"SuperAdmin\UserController@showCreateForm")->name('create_users');
Route::post('/admin/create-user',"SuperAdmin\UserController@storeUser")->name('store_users');










//therapist routes









//appointment routes
Route::get('/admin/appointments/{query?}',"SuperAdmin\AppointmentController@getAppointments")->name('appointments');






Auth::routes();

