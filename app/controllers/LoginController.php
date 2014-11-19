<?php
/*
|--------------------------------------------------------------------------
| Sessions Controller - Tom/20141105
|--------------------------------------------------------------------------
|
| Creates sessions for logging in
|
*/
class LoginController extends \BaseController {


	/**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('login.index');
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
			/*
			|--------------------------------------------------------------------------
			| useremail to username - david/20141114
			|--------------------------------------------------------------------------
			|
			| change name
			|
			*/
			'email'=> $input['username'],
			'password'=>$input['password']
			]);

		if ($attempt) return Redirect::to('/dashboard');
		else return Redirect::to('/login')
			->withInput()
			->with('message','unable to login')
			/*
			|--------------------------------------------------------------------------
			| alert to help-block - david/20141114
			|--------------------------------------------------------------------------
			|
			| simple alert
			|
			*/
			->with('alert-class','help-block');

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