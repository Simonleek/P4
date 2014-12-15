<?php
/* 
 * RESTFUL routing of the task type, detail is defined in this controller (system generated class)
 * Route::get('/tasktype', 'tasktypeController@index');
 * Route::get('/tasktype/create', 'tasktypeController@create');
 * Route::post('/tasktype', 'tasktypeController@store');
 * Route::get('/tasktype/{tasktype_id}', 'tasktypeController@show');
 * Route::get('/tasktype/{tasktype_id}/edit', 'tasktypeController@edit');
 * Route::put('/tasktype/{tasktype_id}', 'tasktypeController@update');
 * Route::delete('/tasktype/{tasktype_id}', 'tasktypeController@destroy');
*/ 
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
		
		$rules = array(
			'name' => 'required|min:5|max:50|unique:taskTypes,name'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {

			return Redirect::to('/tasktype/create')
				->with('flash_message', 'Creation failed')
				->withInput()
				->withErrors($validator);
		}

		$tasktype = new TaskType;
		$tasktype->name = Input::get('name');
		$tasktype->save();

		return Redirect::action('TaskTypeController@index')->with('flash_message','Task type been added and it is available for all users.');
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
			return Redirect::to('/tasktype_index')->with('flash_message', 'Selected task type is no longer available');
		}
		if (Task::taskTypeCountSearch($id) >0)
		{
			return Redirect::action('TaskTypeController@index')->with('flash_message','Task Type cannot be updated because it is in use by you or other user.');
		}

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
			return Redirect::to('/tasktype_index')->with('flash_message', 'Selected task type is no longer available');
		}
		if (Task::taskTypeCountSearch($id) >0)
		{
			return Redirect::action('TaskTypeController@index')->with('flash_message','Task Type cannot be updated because it is in use by you or other user.');
		}
				$rules = array(
			'name' => 'required|alpha_num|min:5|max:50|unique:tasktypes,name'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			$id = Input::get('id');
			return Redirect::to('/tasktype/'.$id.'/edit/')
				->with('flash_message', 'Creation failed.')
				->withInput()
				->withErrors($validator);
		}
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
			return Redirect::to('/tasktype_index')->with('flash_message', 'Selected task type is no longer available');
		}
		if (Task::taskTypeCountSearch($id) >0)
		{
			return Redirect::action('TaskTypeController@index')->with('flash_message','Task Type cannot be deleted because it is in use by you or other user.');
		}
		TaskType::destroy($id);

		return Redirect::action('TaskTypeController@index')->with('flash_message','Task type has been deleted.');

	}


}
