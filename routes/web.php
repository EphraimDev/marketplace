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




Route::get('/',function(){
	return view('superadminBE.index');
})->name('index');

Route::get('/users',function(){
	return view('superadminBE.all_users');
})->name('users');


Route::get('/therapist',function(){
	return view('superadminBE.all_therapist');
})->name('therapists');






Auth::routes();

