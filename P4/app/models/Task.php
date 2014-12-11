<?php

class Task extends Eloquent {

    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');
	/**
	*
	*/

	public function taskType() {
        return $this->belongsTo('TaskType');
    }

	public function user() {
        return $this->belongsTo('User');
    }
	public static function taskTypeCountSearch($id) {
		$taskCount = 0;
		$taskCount= Task::where('taskType_id', '=', $id)->count();
		return $taskCount;
	}
    public static function search($query) {
		$q = 0;
		if ($query == "incomplete")
        	$q=1;
        elseif ($query == "completed")
        	$q =0;
        else
        	$query= null;
        if($query) {
            $tasks = Task::where('user_id', '=', Auth::user()->id)
				->where('completed', '=', $q)
            	->get();
        }
      
        else {
      		 $tasks = Task::where('user_id', '=', Auth::user()->id)
      		 ->get();
        }

        return $tasks;
    }

}