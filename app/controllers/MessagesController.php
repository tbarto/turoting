<?php
/*
|--------------------------------------------------------------------------
| Messages Controller - Tom/20141109
|--------------------------------------------------------------------------
|
| Controller for messages tabs
|
*/
class MessagesController extends \BaseController {
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
}