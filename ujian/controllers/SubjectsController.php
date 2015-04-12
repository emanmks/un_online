<?php

class SubjectsController extends \BaseController {

	/**
	 * Display a listing of subjects
	 *
	 * @return Response
	 */
	public function index()
	{
		$subjects = Subject::all();
		$menu = 'subject';

		return View::make('subjects.index', compact('subjects','menu'));
	}

	/**
	 * Show the form for creating a new subject
	 *
	 * @return Response
	 */
	public function create()
	{
		$menu = 'subject';

		return View::make('subjects.create', compact('menu'));
	}

	/**
	 * Store a newly created subject in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$subject = new Subject;

		$subject->name 			= Input::get('name');
		$subject->save();

		Session::flash('message','Sukses menambahkan Data Bidang Studi Baru!');
	}

	/**
	 * Display the specified subject.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$subject = Subject::findOrFail($id);
		$packages = Package::where('subject_id','=',$id)->paginate(50);

		return View::make('subjects.show', compact('subject','packages'));
	}

	/**
	 * Update the specified subject in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$subject = Subject::findOrFail($id);

		$subject->name 			= Input::get('name');
		$subject->save();

		Session::flash('message','Sukses mengupdate Data Bidang Studi!');
	}

	/**
	 * Remove the specified subject from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Subject::destroy($id);

		return Redirect::route('subjects.index');
	}

}
