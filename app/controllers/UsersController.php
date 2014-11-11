<?php
/*
|--------------------------------------------------------------------------
| Users Controller - Tom/20141109
|--------------------------------------------------------------------------
|
| Controller for user functions
|
*/
class UsersController extends \BaseController {

	
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
	public function index()
	{
		
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /nerds/create
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /nerds
	 *
	 * @return Response
	 */
	public function store()
	{
		
		
	}

	/**
	 * Tom/20141105
	 * show the logged in user's dashboard
	 *
	 * @param param
	 * @return return
	 */
	public function show()
	{
		//a.k.a. "dashboard"
		// get the user
		$id = Auth::id();
		//$user = User::with('profiles')->where('id','=',$id)->get();
		
		//$user = User::with('profiles','received_messages')->find($id);
		
			
		// show the view and pass the user to it
		return View::make('users.show');//->with('user', $user);
		
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /nerds/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /nerds/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /nerds/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	
	}
	/**
	 * Tom/20141108
	 * get a users messages
	 * return a view with messages users.messages
	 * @param param
	 * @return return
	 */
	
}