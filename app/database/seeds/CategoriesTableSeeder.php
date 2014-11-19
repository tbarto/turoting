<?php

class CategoriesTableSeeder extends Seeder {

	public function run(){

		Eloquent::unguard();
		/*
		|--------------------------------------------------------------------------
		| category samples - david/20141114
		|--------------------------------------------------------------------------
		|
		| add more sample here
		|
		*/
		Categorie::create([
			'name'=>'Teacher'
		]);
	}

}