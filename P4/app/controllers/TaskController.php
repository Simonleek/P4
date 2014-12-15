<?php

class TaskController extends \BaseController {
	public function __construct() {
		# Make sure BaseController construct gets called
		parent::__construct();
		# Only logged in users should have access to this controller
		$this->beforeFilter('auth');

	}
	/**
	* Display all tasks
	* @return index View
	*/
	public function getIndex($option) {
		$tasks = Task::search($option);
		$taskTypes = TaskType::getall();
			return View::make('task_index')
				->with('tasks', $tasks)
				->with('taskTypes', $taskTypes);
	}
	/**
	* Show (get) the "Add a Task form"
	* @return View
	*/
	public function getCreate() {
		$taskTypes = TaskType::getIdNamePair();
    	return View::make('task_add')->with('taskTypes',$taskTypes);
	}
	/**
	* Process the posting of  "Add a Task form"
	* @return Redirect
	*/
	public function postCreate() {
		# name is required, and betweenn 5 to 50 characters 
		# detail is not required but has a 200 characters maxium 
		$rules = array(
			'name' => 'required|min:5|max:50',
			'detail' => 'max:200'
		);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()) {
			return Redirect::to('/task/create')
				->with('flash_message', 'Creation failed.')
				->withInput()
				->withErrors($validator);
		}
		$task = new Task();
		$task->fill(Input::all());
		$task->save();
		return Redirect::action('TaskController@getIndex')->with('flash_message','Your task has been added.');

	}

	/**
	* To Process any invalid route.
	* @return Redirect
	*/
	public function missingMethod ($parameters=array()) {
		return Redirect::to('/')->with('flash_message', 'Invalid Route Detected: '.$parameters[0]);
	}

	/**
	* To Process get of Edit with id as the parameter
	* @return Make view
	*/
	public function getEdit($id) {

		try {
		    $task    = Task::findOrFail($id);
		    
		}
		catch(exception $e) {
		    return Redirect::to('/task/view/all')->with('flash_message', 'Selected task is no longer available');
		}
		$taskTypes = TaskType::getIdNamePair();
    	return View::make('task_edit')
    		->with('task', $task)
    		->with('taskTypes', $taskTypes);

	}
	
	/**
	* To Process post of Edit 
	* @return Redirect
	*/
	public function postEdit() {
		# to ensure task still exist before editing
		try {
	        $task = Task::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/task/view/all')->with('flash_message', 'Selected task is no longer available!');
	    }
	    # create rules of task name and task detail
		$rules = array(
			'name' => 'required|min:5|max:50',
			'detail' => 'max:200'
		);
		$validator = Validator::make(Input::all(), $rules);
		# redirect user if rules failed
		if($validator->fails()) {
			$id = Input::get('id');
			return Redirect::to('/task/edit/'.$id)
				->with('flash_message', 'Editing failed.')
				->withInput()
				->withErrors($validator);
		} 
		# save updates and redirect user back to the task index
	    $task->fill(Input::all());
	    $task->save();
	   	return Redirect::action('TaskController@getIndex')->with('flash_message','Your changes have been saved.');
	}

	/**
	* To Process post of delete
	* @return Redirect
	*/
	public function postDelete() {
		# ensure task still exist before deleting
		try {
	        $task = Task::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/task/view/all')->with('flash_message', 'Could not delete task - Selected task is no longer available.');
	    }
		# delete the task according to input id
	    Task::destroy(Input::get('id'));
		# redirect to index
	    return Redirect::to('/task/view/all')->with('flash_message', 'Selected task is deleted.');

	}

}