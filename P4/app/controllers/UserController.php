<?php

	/**
	* User controller class that is similar to the foobook example
	*/
class UserController extends BaseController {
	public function __construct() {
        $this->beforeFilter('guest', array('only' => array('getLogin','getSignup')));
    }
    /**
	* Show the new user signup form
	* @return View
	*/
	public function getSignup() {
		return View::make('signup');
	}

	/**
	* Process the new user signup
	* @return Redirect
	*/
	public function postSignup() {
			$rules = array(
			'email' => 'required|min:5|max:50|email|unique:users,email',
			'password' => 'required|min:6|max:50'
		);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()) {
			return Redirect::to('/signup')
				->with('flash_message', 'Sign up failed; Please fix the errors listed below.')
				->withInput()
				->withErrors($validator);
		}
		$user = new User;
		$user->email    = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		try {
			$user->save();
		}
		catch (Exception $e) {
			return Redirect::to('/signup')
				->with('flash_message', 'Sign up failed; please try again.')
				->withInput();
		}
		# Log in
		Auth::login($user);
		return Redirect::to('/')->with('flash_message', 'Welcome to CSCE15 Task Manager!');
	}

	/**
	* Display the login form
	* @return View
	*/
	public function getLogin() {
		return View::make('login');
	}
	
	/**
	* The handle wrong URL
	*/
	public function missingMethod ($parameters=array()) {
		return Redirect::to('/')->with('flash_message', 'Invalid Route Detected: '.$parameters[0]);
	}
	/**
	* Process the login form
	* @return View
	*/
	public function postLogin() {
		$credentials = Input::only('email', 'password');
		if (Auth::attempt($credentials, $remember = true)) {
			return Redirect::intended('/task/view/all')->with('flash_message', 'Welcome Back!');
		}
		else {
			return Redirect::to('/login')
				->with('flash_message', 'Log in failed; Please try again.')
				->withInput();
		}
		return Redirect::to('login');
	}


	/**
	* Logout
	* @return Redirect
	*/
	public function getLogout() {
		# Log out
		Auth::logout();
		# Send them to the homepage
		return Redirect::to('/');
	}

}