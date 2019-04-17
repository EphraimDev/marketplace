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

Route::get('/admin/view-users',"SuperAdmin\SuperAdminController@allUsers")->name('users');

Route::delete('/admin/delete-user/{id}',"SuperAdmin\SuperAdminController@deleteUser")->name('delete_user');

Route::get('/admin/view-therapist',"SuperAdmin\SuperAdminController@allTherapists")->name('therapists');


Route::get('/admin/appointments/{query?}',"SuperAdmin\SuperAdminController@getAppointments")->name('appointments');






Auth::routes();

