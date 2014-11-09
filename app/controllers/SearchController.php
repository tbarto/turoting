<?php

/*
|--------------------------------------------------------------------------
| SearchController - Tom/20141109
|--------------------------------------------------------------------------
|
| Controller for search functions
|
*/
class SearchController extends BaseController {

	public function results(){
		$data = "Search results will be displayed here.";
				
		$html =  View::make('search.results')
			->with('data',$data)
			->render();
        
        return Response::make($html,200);
	
	}


}