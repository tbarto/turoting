<?php
/*
|--------------------------------------------------------------------------
| Profiles Controller - Tom/20141109
|--------------------------------------------------------------------------
|
| Controller for Profiles tabs
|
*/
class ProfilesController extends \BaseController {
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
	 * Tom/20141108
	 * gets a users profile
	 * 
	 * @param none
	 * @return Response (html) profile of user
	 */
	public function profile(){
		$profile = Profile::with('cities','gus','dongs')
			->where('user_id','=',Auth::id())
			->first();

		$html = View::make('dashboard.profile-ajax',array(
			'profile'=>$profile))
			->render();
			//->with('profile',$profile)
			

		return Response::make($html);
	}
}