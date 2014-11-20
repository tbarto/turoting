<?php
/*
|--------------------------------------------------------------------------
| Dashboard Controller - Tom/20141109
|--------------------------------------------------------------------------
|
| Controller for dashboard tabs
|
*/
class DashboardController extends \BaseController {
	/**
	 * Tom/20141105
	 * constructor for class
	 * require authentication before accessing these controllers
	 * @param param
	 * @return return
	 */
	function __construct() {
        // ...
        $this->beforeFilter('auth');
        // ...
    }	
	/**
	 * Tom/20141105
	 * show the logged in user's dashboard
	 *
	 * @param param
	 * @return return
	 */
	public function index()
	{
		//a.k.a. "dashboard"
		// get the user
		$id = Auth::id();
		//$user = User::with('profiles')->where('id','=',$id)->get();
		
		//$user = User::with('profiles','received_messages')->find($id);
		
			
		// show the view and pass the user to it
		return View::make('dashboard.index');//->with('user', $user);
		
	}
}