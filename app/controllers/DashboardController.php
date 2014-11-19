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
	/**
	 * Tom/20141109
	 * gets all messages of a user
	 *
	 * @param none
	 * @return Response (html) formatted list of messages 
	 */
	public function messages(){
		$messages = Message::with('sender')
			->where('user_id','=',Auth::id())
			->get();

		$html =  View::make('dashboard.messages-ajax')
			->with('messages',$messages)
			->render();

        return Response::make($html);
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

	/**
	 * Tom/20141109
	 * display search form
	 *
	 * @param none
	 * @return Response (html) form with input boxes for Job and Location
	 */
	public function search(){
		$categories = Categorie::all();
		$cities = Citie::all();

		$html = View::make('dashboard.search-ajax')
			->with('categories',$categories)
			->with('cities',$cities)
			->render();

		return Response::make($html);
	}
	/**
	 * Tom/20141109
	 * display search form
	 *
	 * @param none
	 * @return Response (html) form with input boxes for Job and Location
	 */	
	public function results(){
		$data = "Search results will be displayed here.";
				
		$html =  View::make('dashboard.search-results-ajax')
			->with('data',$data)
			->render();
        
        return Response::make($html,200);
	
	}
	/**
	 * Tom/20141109
	 * display a user's contacts
	 *
	 * @param param
	 * @return return
	 */
	public function contacts(){

	}
}