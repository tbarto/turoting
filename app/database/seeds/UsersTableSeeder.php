<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		Eloquent::unguard();
		foreach(range(1, 25) as $index)
		{
			User::create([
				'username' => $faker->userName,
    			'email' => $faker->email,
    			'password' => Hash::make('test'),
    			'confirmed' => 1
			]);
		}
	}

}