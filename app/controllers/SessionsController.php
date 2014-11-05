<?php
/*
|--------------------------------------------------------------------------
| Sessions Controller - Tom/20141105
|--------------------------------------------------------------------------
|
| Creates sessions for logging in
|
*/
class SessionsController extends \BaseController {


	/**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		
		

		$attempt=Auth::attempt([
			'email'=> $input['useremail'],
			'password'=>$input['password']
			]);

		if ($attempt) return Redirect::to('/dashboard');
		else return Redirect::to('/login')->withInput();

	}

	
	/**
	 * Remove the specified resource from storage.
	 * DELETE /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		Session::flush();
		return Redirect::to('/login');
	}

}