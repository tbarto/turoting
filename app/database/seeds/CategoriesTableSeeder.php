<?php

class CategoriesTableSeeder extends Seeder {

	public function run(){

	Eloquent::unguard();

	Categorie::create([
		'name'=>'Teacher'
		]);
	}

}