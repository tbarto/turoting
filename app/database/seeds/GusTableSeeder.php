<?php

class GusTableSeeder extends Seeder {

	public function run(){

	Eloquent::unguard();

	$city_id = DB::table('cities')
		->select('id')
		->where('name','=','Seoul')
		->first();


	$city = $city_id->id;

	Gu::create([
		'name'=>'Gangnam',
		'lat'=> 37.5172363,
		'lng'=> 127.0473248,
		'citie_id' =>$city
		]);
	Gu::create([
		'name'=>'Jongno',
		'lat'=> 37.5729503,
		'lng'=> 126.979357,
		'citie_id' =>$city
		]);
	Gu::create([
		'name'=>'Gwangjin',
		'lat'=> 37.5384843,
		'lng'=> 127.082293,
		'citie_id' =>$city
		]);
	Gu::create([
		'name'=>'Seodaemun',
		'lat'=> 37.579115,
		'lng'=> 126.936778,
		'citie_id' =>$city
		]);
	Gu::create([
		'name'=>'Mapo',
		'lat'=> 37.563756,
		'lng'=> 126.9084210,
		'citie_id' =>$city
		]);
	
	}

}