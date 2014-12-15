<?php 

class IndexController extends BaseController {
	/* simple controller for the index page
	 * it extends the base controller and handles 
	 * http get for the index page. 
	 */
	 
	public function getIndex() {
		return View::make('index');
	}

}