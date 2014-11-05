<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /nerds
	 *
	 * @return Response
	 */
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
	 * Display the specified resource.
	 * GET /nerds/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		// get the user
		$id = Auth::id();
		$user = User::find($id);
				
		// show the view and pass the nerd to it
		return View::make('users.show')->with('user', $user);
		
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

}