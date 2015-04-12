<?php

class ListeningsController extends \BaseController {

	/**
	 * Display a listing of listenings
	 *
	 * @return Response
	 */
	public function index()
	{
		$listenings = Listening::all();

		return View::make('listenings.index', compact('listenings'));
	}

	/**
	 * Show the form for creating a new listening
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('listenings.create');
	}

	/**
	 * Store a newly created listening in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Listening::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Listening::create($data);

		return Redirect::route('listenings.index');
	}

	/**
	 * Display the specified listening.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$listening = Listening::findOrFail($id);

		return View::make('listenings.show', compact('listening'));
	}

	/**
	 * Show the form for editing the specified listening.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$listening = Listening::find($id);

		return View::make('listenings.edit', compact('listening'));
	}

	/**
	 * Update the specified listening in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$listening = Listening::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Listening::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$listening->update($data);

		return Redirect::route('listenings.index');
	}

	/**
	 * Remove the specified listening from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Listening::destroy($id);

		return Redirect::route('listenings.index');
	}

}
