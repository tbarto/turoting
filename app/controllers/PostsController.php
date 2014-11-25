<?php
/*
|--------------------------------------------------------------------------
| Posts Controller - david/20141124
|--------------------------------------------------------------------------
|
| Controller for posts tabs
|
*/
class PostsController extends \BaseController {
	/**
	 * david/20141124
	 * constructor for class
	 * require authentication before accessing these controllers
	 * @param param
	 * @return return
	 */
	function __construct() {
        // ...
        $this->beforeFilter( 'auth' );
        // ...
    }	

	/**
	 * david/20141124
	 * gets all posts of a user
	 *
	 * @param none
	 * @return Response (html) formatted list of posts 
	 */
	public function index(){

		$posts = Post::with( 'users', 'jobs' )
				->where( 'user_id', '=', Auth::id() )
				->get();

		$html = View::make( 'dashboard.posts-ajax' )
				->with( 'posts',$posts )
				->render();

        return Response::make( $html );
	}
}