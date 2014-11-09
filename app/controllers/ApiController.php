<?php

/*
|--------------------------------------------------------------------------
| ApiController - Tom/20141109
|--------------------------------------------------------------------------
|
| Controller for miscellaneous html elements
|
*/
class ApiController extends BaseController {


/**
 * Tom/20141109
 * gets data for a dropdown menu
 *
 * @param $table = table that was selected
 * @return (object) name and id of dropdown items for the dependent dropdown menu
 * javascript function will need to populate dropdown menu with return data
 */
	public function dropdown($table){

	$input = Input::get('option');
	if($table=='categories'){
		$foreign_key='categorie_id';
		$dropdown_table='jobs';
	}elseif($table=='cities'){
		$foreign_key='citie_id'; 
		$dropdown_table='gus';
	}elseif($table=='gus'){
		$foreign_key='gu_id'; 
		$dropdown_table='dongs';
	}
	else exit;

	$data= DB::table($dropdown_table)
		->select('name','id')
		->where($foreign_key, '=', $input)->get();

	return Response::make($data,200);
	}


}