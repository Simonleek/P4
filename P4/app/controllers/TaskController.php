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
	* Process the searchform
	* @return View
	*/
	public function getSearch() {

		return View::make('task_search');

	}
	

	/**
	* Display all tasks
	* @return View
	*/
	public function getIndex($option) {
		$tasks = Task::search($option);
			return View::make('task_index')
				->with('tasks', $tasks);
	}


	/**
	* Show the "Add a Task form"
	* @return View
	*/
	public function getCreate() {

		$users = User::getIdNamePair();

    	return View::make('task_add')->with('users',$users);

	}


	/**
	* Process the "Add a book form"
	* @return Redirect
	*/
	public function postCreate() {

		# Instantiate the book model
		$task = new Task();

		$task->fill(Input::all());
		$task->save();

		# Magic: Eloquent
		$task->save();

		return Redirect::action('TaskController@getIndex')->with('flash_message','Your task has been added.');

	}
	public function getEdit($id) {

		try {
		    $task    = Task::findOrFail($id);
		}
		catch(exception $e) {
		    return Redirect::to('/task/view/all')->with('flash_message', 'task not found');
		}

    	return View::make('task_edit')
    		->with('task', $task);

	}
	public function postEdit() {

		try {
	        $task = Task::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/task/view/all')->with('flash_message', 'task not found');
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
	        return Redirect::to('/task/view/all')->with('flash_message', 'Could not delete task - not found.');
	    }

	    Task::destroy(Input::get('id'));

	    return Redirect::to('/task/view/all')->with('flash_message', 'task deleted.');

	}

}