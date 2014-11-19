<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RoleUsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		Eloquent::unguard();
		/*
		|--------------------------------------------------------------------------
		| role users sample - david/20141114
		|--------------------------------------------------------------------------
		|
		| add more sample here
		| no model for role users
		*/
		foreach(range(1, 25) as $index)
		{
			DB::table('role_users')->insert(
    			array(
    				'user_id' => $index, 
    				'role_id' => $faker->numberBetween($min = 1, $max = 3), 
    				'created_at'=>time(),
    				'updated_at'=>time()
    			)
			);
		}
	}
}