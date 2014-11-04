<?php

class JobsTableSeeder extends Seeder {

	public function run(){

	Eloquent::unguard();

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