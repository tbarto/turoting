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

		$html =  View::make('dashboard.messages')
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

		$html = View::make('dashboard.profile',array(
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

		$html = View::make('dashboard.search')
			->with('categories',$categories)
			->with('cities',$cities)
			->render();

		return Response::make($html);
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














