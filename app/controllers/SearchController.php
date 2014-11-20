<?php
/*
|--------------------------------------------------------------------------
| Search Controller - Tom/20141109
|--------------------------------------------------------------------------
|
| Controller for Search tabs
|
*/
class SearchController extends \BaseController {
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
}