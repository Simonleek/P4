<?php

class TaskType extends Eloquent {

	protected $table = 'taskTypes';
	public function task() {
        return $this->hasMany('Task');
    }
	public static function getall() {
       $taskTypes = TaskType::all();
        return $taskTypes;
    }
    public static function getIdNamePair() {
		$taskTypes = Array();
		$collection = TaskType::all();
		foreach($collection as $taskType) {
			$taskTypes[$taskType->id] = $taskType->name;
		}
		return $taskTypes;
	}

}