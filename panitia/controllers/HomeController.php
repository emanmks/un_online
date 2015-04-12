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
		$subjects = Subject::all()->count();
		$packages = Package::all()->count();
		$users = User::all()->count();
		$examinations = Examination::all()->count();
		$menu = 'dashboard';

		return View::make('dashboard', compact('subjects','packages','users','examinations','menu'));
	}

	public function importUser()
	{

		$logins = Login::all();

		foreach($logins as $login) {

			$user 			= new User;
			$user->username = $login->student_id;
			$user->password = Hash::make($login->pin);
			$user->pin 		= $login->pin;
			$user->save();

		}

	}

}
