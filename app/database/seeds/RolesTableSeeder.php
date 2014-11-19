<?php

// Composer: "fzaninotto/faker": "v1.3.0"
// use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

	public function run()
	{
		// $faker = Faker::create();
		Eloquent::unguard();
		/*
		|--------------------------------------------------------------------------
		| roles sample - david/20141114
		|--------------------------------------------------------------------------
		|
		| add more sample here
		|
		*/
		Role::create([
			'name'=>'role1'
		]);
		Role::create([
			'name'=>'role2'
		]);
		Role::create([
			'name'=>'role3'
		]);
	}

}