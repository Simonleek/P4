<?php
/**
* This is the class that describe the task type.  
* it also defines the relationship between task type and task
*/
class TaskType extends Eloquent {
	protected $table = 'taskTypes';
	public function task() {
        return $this->hasMany('Task');
    }
    # get all task type
	public static function getall() {
       $taskTypes = TaskType::all();
        return $taskTypes;
    }
    public static function countAll() {
       $count = TaskType::count();
        return $count;
    }
    # get the id and task type name
    public static function getIdNamePair() {
		$taskTypes = Array();
		$collection = TaskType::all();
		foreach($collection as $taskType) {
			$taskTypes[$taskType->id] = $taskType->name;
		}
		return $taskTypes;
	}
}