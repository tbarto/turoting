<?php

class CitiesTableSeeder extends Seeder {

	public function run(){

		Eloquent::unguard();
		/*
		|--------------------------------------------------------------------------
		| cities samples - david/20141114
		|--------------------------------------------------------------------------
		|
		| add more sample here
		|
		*/
		Citie::create([
			'name'=>'Seoul',
			'lat'=> 37.566535,
			'lng'=> 126.977969199
		]);
		Citie::create([
			'name'=>'Busan',
			'lat'=> 35.1795543,
			'lng'=> 129.07564160
		]);
	
	}

}