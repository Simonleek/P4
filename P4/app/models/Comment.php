<?php
/* this feature is not coded and will be used in the future design */
class Comment extends Eloquent {

    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');

    /**
    * A Comment always belongs to one Task
	*/
	public function tasks() {

        return $this->belongsTo('Task');

    }
}