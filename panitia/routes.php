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

Route::get('/', 'HomeController@showDashboard');
Route::get('import', 'HomeController@importUser');

Route::resource('subject', 'SubjectsController');
	Route::put('subject/{id}/hide','SubjectsController@hide');
	Route::put('subject/{id}/unhide','SubjectsController@unhide');
Route::resource('package', 'PackagesController', array('only' => array('index','show','create','update','destroy')));
	Route::any('uploadpackage', 'PackagesController@store');
Route::resource('login', 'UsersController');
Route::resource('examination', 'ExaminationsController');
Route::resource('question', 'QuestionsController', array('only' => array('update')));