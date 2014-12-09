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
	/**
	 * Tom/20141202
	 * gets user's image and name for modal window
	 *
	 * @param post int id
	 * @return html (for modal dialog box)
	 */
	public function modalWindow(){
		
		$input = Input::all();
		$id = $input['id'];

		$user = DB::table('profiles')->where('user_id','=',$id )->first();
		

		//make html for modal
		$html = View::make('utility.modalWindow')
			->with('user',$user)
			->render();

		return Response::make($html);

	}
	/**
	 * Store a newly created message.
	 * POST /messages
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$newMessage = new Message;
		$newMessage->from_id = $input['from_id'];
		$newMessage->user_id = $input['to_id'];
		$newMessage->content = $input['message'];
		$newMessage->read=false;
		$newMessage->save();

		$message = "Message Sent!";

		return $message;

	}

}