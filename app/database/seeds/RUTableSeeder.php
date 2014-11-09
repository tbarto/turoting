<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RUTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		Eloquent::unguard();
		foreach(range(1, 25) as $index)
		{
			DB::table('role_user')->insert(
    			array('user_id' => $index, 'role_id' => $faker->numberBetween($min = 2, $max = 3), 'created_at'=>time(),'updated_at'=>time())
				);

			
		}
	}

}