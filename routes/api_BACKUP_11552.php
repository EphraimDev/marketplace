<?php

use Illuminate\Http\Request;

/**
 * Routes for api/v1 strictly
 */


/**
 * User routes.
 * Please this route is for the entire user type (ordinary users | super admin | therapists)
 * The individual user types all have their own routes below
 * This route will be used mainly by the super admin
 *
 */
Route::get('/users/{id}', "UserController@show");

Route::get('/users', "UserController@index");

Route::delete('/users/{id}', "UserController@destroy");

Route::put('/users/{id}', "UserController@update");


<<<<<<< HEAD
// Auth routes
Route::post('/auth/register', "AuthController@register");
=======
/**
 * Auth routes
 *
 */
Route::post('/auth/register',"AuthController@register");
>>>>>>> server

Route::post('/auth/login', "AuthController@login");

Route::post('/auth/logout', "AuthController@logout");

Route::get('/auth/user', "AuthController@details");

/**
 * Therapist routes
 * Routes here are strictly for the therapist
 *
 */
Route::get('/therapists', "TherapistController@index");

Route::get('/therapists/{id}', "TherapistController@show");

Route::get('/therapists/available', "TherapistController@avilableTherapists");

Route::put('/therapists/{id}/status', "TherapistController@changeStatus");

Route::post('/therapists/search/{name}', "TherapistController@search");

Route::put('/therapists/{id}', "TherapistController@update");

Route::delete('/therapists/{id}', "TherapistController@destroy");

Route::post('/therapists/{name}/verify', "TherapistController@verify");

/**
 * Ordinary user routes
 * The ordinary user is also known as the therapist's client
 *
 */
<<<<<<< HEAD
// Fetch all ordinary users
Route::get('/ordinary-users', "OrdinaryUserController@index");
=======
Route::get('/ordinary-users', "OrdinaryUserController@index"); 
>>>>>>> server

Route::get('/ordinary-users/{id}', "OrdinaryUserController@show");

Route::delete('/ordinary-users/{id}', "OrdinaryUserController@destroy");

Route::put('/ordinary-users/{id}', "OrdinaryUserController@update");

Route::put('/ordinary-users/{id}/status', "OrdinaryUserController@updateStatus");

Route::post('/ordinary-users/{id}/pay', "OrdinaryUserController@pay"); 

/**
 * Appointment routes
 * Routes here are strictly for appointments
 *
 */
Route::post('/appointments/ordinary-user/{userId}/therapist/{therapistId}/book', "AppointmentController@book"); 

Route::get('/appointments/ordinary-user/{userId}', "AppointmentController@userAppointments"); 

Route::put('/appointments/{appointmentId}/ordinary-user/{userId}/start', "AppointmentController@startSession"); 

Route::put('/appointments/{appointmentId}/ordinary-user/{userId}/end', "AppointmentController@endSession"); 

Route::get('/appointments/therapist/{therapistId}', "AppointmentController@therapistAppointments"); 

Route::get('/appointments/{appointmentId}/therapist/{therapistId}', "AppointmentController@singleAppointment"); 

Route::put('/appointments/{appointmentId}/therapist/{therapistId}/reject', "AppointmentController@rejectAppointment"); 

Route::put('/appointments/{appointmentId}/therapist/{therapistId}/accept', "AppointmentController@acceptAppointment"); 


// Please delete don't the code below
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    
});*/
