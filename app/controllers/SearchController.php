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
	// public function results(){
	// 	$data = "Search results will be displayed here.";
				
	// 	$html =  View::make('dashboard.search-results-ajax')
	// 		->with('data',$data)
	// 		->render();
        
 //        return Response::make($html,200);
	
	// }
/**
 * Tom/20141114
 * query search results
 *
 * @param GET method, search criteria from user-form
 * @return JSON data, (HTML for search results and points for map)
 */
	public function results(){
			
			//query users
			$data = Profile::with('cities','gus','dongs')
			->orderBy('dong_id','desc')
			->whereIn('user_id', function($query)
			{
				$query->select('user_id')
						->from('job_users')
						->distinct()
						->where('categorie_id','=',Input::get('category'))
						->where('job_id','=',Input::get('job'))
						->where('dong_id','=',Input::get('dong'));
				})
			->get();
	
			//get count of users in each dong
			$points = $this->count_values($data,'dong_id');
			
			//render html for search results
			$html = View::make('dashboard.search-results-ajax')
				->with('data',$data)
				->render();

		return Response::json(array('html'=>$html,'points'=>$points));
	}
/**
 * Tom/20141113
 * Helper function to count the number of users in each dong in a query result
 *
 * @param array (user profiles), int (id of field to count)
 * @return array of objects(dongs with number of users and location)
 */
	public function count_values($data,$field){

		$fieldid=-1;
		$count=0;
		$array = array();

		//loop through profiles and group all users within each dong
		foreach($data as $datum){
			if ($fieldid == $datum->$field){ //another item in list
				$count++;
			}else{
				if ($fieldid == -1){ //first item in list
					$count++;
					$fieldid = $datum->$field;
				}else{ //new item
					$newDong = new StdClass();
					$newDong->name = $name;
					$newDong->id = $fieldid;
					$newDong->count= $count;
					$newDong->lat=$lat;
					$newDong->lng=$lng;
					array_push($array,$newDong);
					$count = 1;
					$fieldid=$datum->$field;
				}
			}
			$name=$datum->dongs->name;
			$lat=$datum->dongs->lat;
			$lng=$datum->dongs->lng;
		}
		//add last entry to array after loop stops
		if($fieldid != -1){ 
			$newDong = new StdClass();
			$newDong->name = $name;
			$newDong->id = $fieldid;
			$newDong->count= $count;
			$newDong->lat=$lat;
			$newDong->lng=$lng;
			array_push($array,$newDong);
		}

		return $array;
	}

}