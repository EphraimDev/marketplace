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



/**
 * Auth routes
 *
 */
Route::post('/auth/register',"AuthController@register");

Route::post('/auth/login', "AuthController@login");

Route::post('/auth/logout', "AuthController@logout");

Route::middleware('auth:api')->get('/auth/user', "AuthController@details");

Route::post('/auth/register/therapist', "AuthController@registerTherapist");


/**
 * Therapist routes
 * Routes here are strictly for the therapist
 *
 */
Route::get('/therapists', "TherapistController@index");

Route::get('/therapists/{therapistId}', "TherapistController@show");

Route::get('/therapists/availability/available', "TherapistController@avilableTherapists");

Route::middleware('auth:api')->put('/therapists/{therapistId}/availability/change', "TherapistController@changeAvailability");

Route::post('/therapists/search/{name}', "TherapistController@search");

Route::middleware('auth:api')->post('/therapists/{therapistId}', "TherapistController@update");

Route::get('/therapists/{therapistId}/verification/status', "TherapistController@verifyStatus");

Route::middleware('auth:api')->post('/therapists/{therapistId}/verification/verify', "TherapistController@requestVerification");

Route::get('/therapists/verification/unverified', 'TherapistController@unverifiedTherapists');

Route::get('/therapists/verification/verified', 'TherapistController@verifiedTherapists');




/**
 * Ordinary user routes
 * The ordinary user is also known as the therapist's client
 *
 */
Route::get('/ordinary-users', "OrdinaryUserController@index");

Route::get('/ordinary-users/{userId}', "OrdinaryUserController@show");

Route::middleware('auth:api')->put('/ordinary-users/{userId}', "OrdinaryUserController@update");

Route::post('/ordinary-users/{id}/pay', "OrdinaryUserController@pay");

/**
 * Appointment routes
 * Routes here are strictly for appointments
 *
 */
 Route::group(['middleware' => 'auth:api'], function() {

    Route::post('/appointments/ordinary-user/{userId}/therapist/{therapistId}/book', "AppointmentController@book");

    Route::get('/appointments/ordinary-user/{userId}', "AppointmentController@userAppointments");

    Route::get('/appointments/{appointmentId}/ordinary-user/{userId}', "AppointmentController@userSingleAppointment");

    Route::put('/appointments/{appointmentId}/ordinary-user/{userId}/start', "AppointmentController@startSession");

    Route::put('/appointments/{appointmentId}/ordinary-user/{userId}/end', "AppointmentController@endSession");

    Route::get('/appointments/therapist/{therapistId}', "AppointmentController@therapistAppointments");

    Route::get('/appointments/{appointmentId}/therapist/{therapistId}', "AppointmentController@therapistSingleAppointment");

    Route::put('/appointments/{appointmentId}/therapist/{therapistId}/reject', "AppointmentController@rejectAppointment");

    Route::put('/appointments/{appointmentId}/therapist/{therapistId}/accept', "AppointmentController@acceptAppointment");

});
