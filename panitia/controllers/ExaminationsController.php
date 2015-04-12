<?php

class ExaminationsController extends \BaseController {

	/**
	 * Display a listing of examinations
	 *
	 * @return Response
	 */
	public function index()
	{
		$examinations = Examination::all();
		$menu = 'examinations';

		return View::make('examinations.index', compact('examinations','menu'));
	}

	/**
	 * Show the form for creating a new examination
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('examinations.create');
	}

	/**
	 * Store a newly created examination in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Examination::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Examination::create($data);

		return Redirect::route('examinations.index');
	}

	/**
	 * Display the specified examination.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$examination = Examination::findOrFail($id);

		return View::make('examinations.show', compact('examination'));
	}

	/**
	 * Show the form for editing the specified examination.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$examination = Examination::find($id);

		return View::make('examinations.edit', compact('examination'));
	}

	/**
	 * Update the specified examination in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$examination = Examination::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Examination::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$examination->update($data);

		return Redirect::route('examinations.index');
	}

	/**
	 * Remove the specified examination from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Examination::destroy($id);

		return Redirect::route('examinations.index');
	}

}
