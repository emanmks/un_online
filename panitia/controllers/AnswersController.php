<?php

class AnswersController extends \BaseController {

	/**
	 * Display a listing of answers
	 *
	 * @return Response
	 */
	public function index()
	{
		$answers = Answer::all();

		return View::make('answers.index', compact('answers'));
	}

	/**
	 * Show the form for creating a new answer
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('answers.create');
	}

	/**
	 * Store a newly created answer in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Answer::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Answer::create($data);

		return Redirect::route('answers.index');
	}

	/**
	 * Display the specified answer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$answer = Answer::findOrFail($id);

		return View::make('answers.show', compact('answer'));
	}

	/**
	 * Show the form for editing the specified answer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$answer = Answer::find($id);

		return View::make('answers.edit', compact('answer'));
	}

	/**
	 * Update the specified answer in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$answer = Answer::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Answer::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$answer->update($data);

		return Redirect::route('answers.index');
	}

	/**
	 * Remove the specified answer from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Answer::destroy($id);

		return Redirect::route('answers.index');
	}

}
