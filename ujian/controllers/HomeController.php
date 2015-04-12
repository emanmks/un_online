<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showDashboard()
	{
		$examinations 	= Examination::where('user_id','=',Auth::user()->id)->get();
		$subjects 		= Subject::where('hide','=',0)->get();

		return View::make('dashboard', compact('examinations','subjects'));
	}

}
