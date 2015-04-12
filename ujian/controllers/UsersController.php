<?php

class UsersController extends \BaseController {

	public function getLogin() {

		return View::make('users.login');

	}

	public function login() {

		$input = Input::all();

		$attempt = Auth::attempt([
			'username' => $input['username'],
			'password' => $input['password']
		]);

		if($attempt) return Redirect::intended('/');

		return Redirect::back()->with('flash_message','Login Gagal')->withInput();

	}

	public function logout() {

		Auth::logout();

		return Redirect::route('login.form')->with('flash_message','Anda telah Logout');

	}

}
