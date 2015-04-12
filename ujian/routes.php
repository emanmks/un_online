<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('login', array('as' => 'login.form', 'uses' => 'UsersController@getLogin'));
Route::post('login', array('as' => 'login.auth', 'uses' => 'UsersController@login'));
Route::get('logout', array('uses' => 'UsersController@logout'));

Route::group(array('before' => 'auth'), function() {

	Route::get('/', 'HomeController@showDashboard');

	Route::get('bidangstudi/{id}', 'SubjectsController@show');
	Route::get('paket/{id}', 'PackagesController@show');
	
	Route::resource('ujian','ExaminationsController', array('only' => array('index','show')));

	Route::get('history/{user_id}', 'ExaminationsController@history');

});

Route::post('ujian','ExaminationsController@store');