<?php

class PicturesController extends \BaseController {

	/**
	 * Display a listing of pictures
	 *
	 * @return Response
	 */
	public function index()
	{
		$pictures = Picture::all();

		return View::make('pictures.index', compact('pictures'));
	}

	/**
	 * Show the form for creating a new picture
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pictures.create');
	}

	/**
	 * Store a newly created picture in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Picture::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Picture::create($data);

		return Redirect::route('pictures.index');
	}

	/**
	 * Display the specified picture.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$picture = Picture::findOrFail($id);

		return View::make('pictures.show', compact('picture'));
	}

	/**
	 * Show the form for editing the specified picture.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$picture = Picture::find($id);

		return View::make('pictures.edit', compact('picture'));
	}

	/**
	 * Update the specified picture in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$picture = Picture::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Picture::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$picture->update($data);

		return Redirect::route('pictures.index');
	}

	/**
	 * Remove the specified picture from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Picture::destroy($id);

		return Redirect::route('pictures.index');
	}

}
