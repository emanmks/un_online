<?php

class LiteraturesController extends \BaseController {

	/**
	 * Display a listing of literatures
	 *
	 * @return Response
	 */
	public function index()
	{
		$literatures = Literature::all();

		return View::make('literatures.index', compact('literatures'));
	}

	/**
	 * Show the form for creating a new literature
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('literatures.create');
	}

	/**
	 * Store a newly created literature in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Literature::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Literature::create($data);

		return Redirect::route('literatures.index');
	}

	/**
	 * Display the specified literature.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$literature = Literature::findOrFail($id);

		return View::make('literatures.show', compact('literature'));
	}

	/**
	 * Show the form for editing the specified literature.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$literature = Literature::find($id);

		return View::make('literatures.edit', compact('literature'));
	}

	/**
	 * Update the specified literature in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$literature = Literature::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Literature::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$literature->update($data);

		return Redirect::route('literatures.index');
	}

	/**
	 * Remove the specified literature from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Literature::destroy($id);

		return Redirect::route('literatures.index');
	}

}
