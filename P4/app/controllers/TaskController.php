<?php

class TaskController extends \BaseController {


	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

		# Only logged in users should have access to this controller
		$this->beforeFilter('auth');

	}
	/**
	* Display all tasks
	* @return View
	*/
	public function getIndex($option) {
		$tasks = Task::search($option);
		$taskTypes = TaskType::getall();
			return View::make('task_index')
				->with('tasks', $tasks)
				->with('taskTypes', $taskTypes);
	}


	/**
	* Show the "Add a Task form"
	* @return View
	*/
	public function getCreate() {
		$taskTypes = TaskType::getIdNamePair();
    	return View::make('task_add')->with('taskTypes',$taskTypes);
	}


	/**
	* Process the "Add a book form"
	* @return Redirect
	*/
	public function postCreate() {
		$rules = array(
			'name' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {

			return Redirect::to('/task/create')
				->with('flash_message', 'Creation failed; task name is required.')
				->withInput()
				->withErrors($validator);
		}
		# Instantiate the book model
		$task = new Task();

		$task->fill(Input::all());
		//$task->save();
		# Magic: Eloquent
		$task->save();

		return Redirect::action('TaskController@getIndex')->with('flash_message','Your task has been added.');

	}
	public function missingMethod ($parameters=array()) {
return Redirect::to('/')->with('flash_message', 'Invalid Route Detected: '.$parameters[0]);
}
	public function getEdit($id) {

		try {
		    $task    = Task::findOrFail($id);
		    $taskTypes = TaskType::getIdNamePair();
		}
		catch(exception $e) {
		    return Redirect::to('/task/view/all')->with('flash_message', 'Selected task is no longer available');
		}

    	return View::make('task_edit')
    		->with('task', $task)
    		->with('taskTypes', $taskTypes);

	}
	public function postEdit() {

		try {
	        $task = Task::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/task/view/all')->with('flash_message', 'Selected task is no longer available');
	    }
		$rules = array(
			'name' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {

			return Redirect::to('/task/view/all')
				->with('flash_message', 'Creation failed.')
				->withInput()
				->withErrors($validator);
		} 
	    $task->fill(Input::all());
	    $task->save();
	   	return Redirect::action('TaskController@getIndex')->with('flash_message','Your changes have been saved.');

	}


	public function postDelete() {

		try {
	        $task = Task::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/task/view/all')->with('flash_message', 'Could not delete task - Selected task is no longer available.');
	    }

	    Task::destroy(Input::get('id'));

	    return Redirect::to('/task/view/all')->with('flash_message', 'Selected task is deleted.');

	}

}