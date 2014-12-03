<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	public function task() {
        return $this->hasMany('Task');
    }
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 
	protected $hidden = array('password', 'remember_token');
    public static function getIdNamePair() {

		$users = Array();

		$collection = User::all();

		foreach($collection as $user) {
			$users[$user->id] = $user->email;
		}

		return $users;
	}
*/
}
