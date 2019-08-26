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

Route::get('createlead', function () {
    return view('createlead');
});

Route::get('/', function(){
	return view('welcome');
});

Route::get('/leadlist', 'LeadController@getLeadList');

Route::post('createLead' , 'LeadController@addLead')->name('createLead');
Route::get('viewlead/{id}' , 'LeadController@getLeadDetails');

Route::get('signup' , 'CustomAuthController@showSignUp')->name('signup');
Route::post('signup' , 'CustomAuthController@register');

Route::get('login' , 'CustomAuthController@showLogin')->name('login');
Route::post('login' , 'CustomAuthController@login');