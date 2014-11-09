<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class JUTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		Eloquent::unguard();
		foreach(range(1, 25) as $index)
		{
			DB::table('job_user')->insert(
    			array('user_id' => $index, 'job_id' => $faker->numberBetween($min = 1, $max = 4))
				);

			//Job_User::create([
		//		'user_id' => $index,
		//		'job_id' => numberBetween($min = 1, $max = 4)
		//	]);
		}
	}

}