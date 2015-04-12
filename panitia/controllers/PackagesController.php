<?php

class PackagesController extends \BaseController {

	/**
	 * Display a listing of packages
	 *
	 * @return Response
	 */
	public function index()
	{
		$packages = Package::all();
		$subjects = Subject::all();
		$menu = 'package';

		return View::make('packages.index', compact('packages','menu'));
	}

	/**
	 * Show the form for creating a new package
	 *
	 * @return Response
	 */
	public function create()
	{
		$menu 			= 'package';

		$package  					= new Package;
		$package->subject_id		= Input::get('subject_id');
		$package->code 				= Input::get('code');
		$package->save();

		$literature 	= Input::get('literature');
		$listening 		= Input::get('listening');
		$question 		= Input::get('question');

		return View::make('packages.create', compact('package','menu','literature','listening','question'));
	}

	/**
	 * Store a newly created package in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$package_id = Input::get('package_id');

		$array_literatures = array();
		$array_listenings = array();

		if(!empty(Input::file('literatures'))) {

			foreach(Input::file('literatures') as $literature) {

				$uploaded_filename  = time().$literature->getClientOriginalName();
				$literature->move('assets/literatures', $uploaded_filename);

				$literat 				= new Literature;
				$literat->filename 		= $uploaded_filename;
				$literat->save();

				array_push($array_literatures, $literat->id);

			}

		}
 
		if(!empty(Input::file('listenings'))) {

			foreach(Input::file('listenings') as $listening) {

				$uploaded_filename  = time().$listening->getClientOriginalName();
				$listening->move('assets/listenings', $uploaded_filename);

				$listen 				= new listening;
				$listen->filename 		= $uploaded_filename;
				$listen->save();

				array_push($array_listenings, $listen->id);

			}

		}


		$literals 	= Input::get('questionliteratures');
		$listens 	= Input::get('questionlistenings'); 

		$answers 	= Input::get('answers');

		$counter = 0;

		foreach(Input::file('questions') as $question) {

			if(is_object($question)) {

				$uploaded_filename  = time().$question->getClientOriginalName();
				$question->move('assets/questions', $uploaded_filename);

				$picture 			= new Picture;
				$picture->filename 	= $uploaded_filename;
				$picture->save();

				$picture_id 	= $picture->id;
				
				if($literals[$counter] > 0 && count($array_literatures) > 0) {
					$literature_id = $array_literatures[$literals[$counter]-1];
				} else {
					$literature_id = 0;
				}

				if($listens[$counter] > 0 && count($array_listenings) > 0) {
					$listening_id = $array_listenings[$listens[$counter]-1];	
				} else {
					$listening_id = 0;
				}

				$question 							= new Question;
				$question->package_id 				= $package_id;
				$question->picture_id 				= $picture_id;
				$question->literature_id			= $literature_id;
				$question->listening_id 			= $listening_id;
				$question->answer 					= $answers[$counter];
				$question->save();

				$counter++;

			} else {

				break;

			}

		}

		return Redirect::to('package');

	}

	/**
	 * Display the specified package.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$package = Package::findOrFail($id);
		$menu = 'package';

		return View::make('packages.show', compact('package','menu'));
	}

	/**
	 * Show the form for editing the specified package.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$package = Package::find($id);

		return View::make('packages.edit', compact('package'));
	}

	/**
	 * Update the specified package in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$package = Package::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Package::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$package->update($data);

		return Redirect::route('packages.index');
	}

	/**
	 * Remove the specified package from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Package::destroy($id);

		Session::flash('message','Sukses menghapus Paket Soal!');
	}

}
