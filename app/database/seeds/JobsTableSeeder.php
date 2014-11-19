<?php

class JobsTableSeeder extends Seeder {

	public function run(){

		Eloquent::unguard();
		/*
		|--------------------------------------------------------------------------
		| job sample - david/20141114
		|--------------------------------------------------------------------------
		|
		| add more sample here
		|
		*/
		Job::create([
			'categorie_id'=> 1,
			'name'=>'Science'
		]);
		Job::create([
			'categorie_id'=> 1,
			'name'=>'Math'
		]);
		Job::create([
			'categorie_id'=> 1,
			'name'=>'English'
		]);
		Job::create([
			'categorie_id'=> 1,
			'name'=>'Piano'
		]);
	}

}