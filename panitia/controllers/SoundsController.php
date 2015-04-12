<?php

class SoundsController extends \BaseController {

	/**
	 * Display a listing of sounds
	 *
	 * @return Response
	 */
	public function index()
	{
		$sounds = Sound::all();

		return View::make('sounds.index', compact('sounds'));
	}

	/**
	 * Show the form for creating a new sound
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sounds.create');
	}

	/**
	 * Store a newly created sound in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Sound::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Sound::create($data);

		return Redirect::route('sounds.index');
	}

	/**
	 * Display the specified sound.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$sound = Sound::findOrFail($id);

		return View::make('sounds.show', compact('sound'));
	}

	/**
	 * Show the form for editing the specified sound.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sound = Sound::find($id);

		return View::make('sounds.edit', compact('sound'));
	}

	/**
	 * Update the specified sound in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$sound = Sound::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Sound::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$sound->update($data);

		return Redirect::route('sounds.index');
	}

	/**
	 * Remove the specified sound from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Sound::destroy($id);

		return Redirect::route('sounds.index');
	}

}
