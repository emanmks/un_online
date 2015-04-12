<?php

class QuestionsController extends \BaseController {

	/**
	 * Display a listing of questions
	 *
	 * @return Response
	 */
	public function index()
	{
		$questions = Question::all();

		return View::make('questions.index', compact('questions'));
	}

	/**
	 * Show the form for creating a new question
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('questions.create');
	}

	/**
	 * Store a newly created question in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Question::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Question::create($data);

		return Redirect::route('questions.index');
	}

	/**
	 * Display the specified question.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$question = Question::findOrFail($id);

		return View::make('questions.show', compact('question'));
	}

	/**
	 * Show the form for editing the specified question.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$question = Question::find($id);

		return View::make('questions.edit', compact('question'));
	}

	/**
	 * Update the specified question in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$question = Question::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Question::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$question->update($data);

		return Redirect::route('questions.index');
	}

	/**
	 * Remove the specified question from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Question::destroy($id);

		return Redirect::route('questions.index');
	}

}
