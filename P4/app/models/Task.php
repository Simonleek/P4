<?php

class Task extends Eloquent {

    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');

    /**
    * A Task always belongs to one user
	*/
	public function Comment() {

        return $this->belongsTo('User');

    }
    /*
	public static function search() {
       $tasks = Task::Where('user_id', '=', Auth::user()->id)
            ->get();
        return $tasks;
    }*/
    public static function search($query) {
		$q = 0;
		if ($query == "incomplete")
        	$q=1;
        elseif ($query == "completed")
        	$q =0;
        else
        	$query= null;
        # If there is a query, search the library with that query
        if($query) {

            # Eager load tags and author
            $tasks = Task::Where('user_id', '=', Auth::user()->id)
            ->where('completed', '=', $q)
            ->get();
        }
      
        else {
      		 $tasks = Task::Where('user_id', '=', Auth::user()->id)
            ->get();
        }

        return $tasks;
    }

}