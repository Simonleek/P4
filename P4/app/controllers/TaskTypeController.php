<?php

class TaskTypeController extends \BaseController {
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

		# Only logged in users are allowed here
		$this->beforeFilter('auth');

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tasktypes = TaskType::all();
		return View::make('tasktype_index')->with('tasktypes',$tasktypes);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tasktype_create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$tasktype = new TaskType;
		$tasktype->name = Input::get('name');
		$tasktype->save();

		return Redirect::action('TaskTypeController@index')->with('flash_message','Your tag been added.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
				$tasktypes = TaskType::find($id);
		return View::make('tasktype_index')->with('tasktypes',$tasktypes);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
				try {
			$tasktype = TaskType::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/tasktype_index')->with('flash_message', 'Task Type not found');
		}

		# Pass with the $tag object so we can do model binding on the form
		return View::make('tasktype_edit')->with('tasktype', $tasktype);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try {
			$tasktype = TaskType::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/tasktype_index')->with('flash_message', 'Task Type not found');
		}
//need to check if it is in use by other ppl before editing 
		$tasktype->name = Input::get('name');
		$tasktype->save();

		return Redirect::action('TaskTypeController@index')->with('flash_message','Your task type has been saved.');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
				try {
			$tasktype = TaskType::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/tasktype_index')->with('flash_message', 'tasktype not found');
		}
		TaskType::destroy($id);

		return Redirect::action('TaskTypeController@index')->with('flash_message','Your  task type has been deleted.');

	}


}
