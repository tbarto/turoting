<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class JobUsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		Eloquent::unguard();
		/*
		|--------------------------------------------------------------------------
		| job user sample - david/20141114
		|--------------------------------------------------------------------------
		|
		| add more sample here
		| no model for job_users
		*/
		foreach(range(1, 25) as $index)
		{
			DB::table('job_users')->insert(
				array(
					'user_id' => $index, 
					'job_id' => $faker->numberBetween($min = 1, $max = 4),
					'categorie_id' => 1,
					'citie_id' => $faker->numberBetween($min = 1, $max = 2),
					'gu_id' => $faker->numberBetween($min = 1, $max = 5),
					'dong_id' => $faker->numberBetween($min = 1, $max = 17)
				)
			);
		}
	}

}