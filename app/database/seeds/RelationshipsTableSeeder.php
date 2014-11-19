<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RelationshipsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		Eloquent::unguard();
		/*
		|--------------------------------------------------------------------------
		| Relationships sample - david/20141114
		|--------------------------------------------------------------------------
		|
		| add more sample here
		|
		*/
		foreach (range(1, 10) as $index) {
			Relationship::create([
				'worker_id'=>$faker->unique()->numberBetween($min= 1,$max=25),
				'customer_id'=>$faker->unique()->numberBetween($min= 1,$max=25),
				'job_id'=>$faker->numberBetween($min= 1,$max=4),
				'review_id'=>$faker->numberBetween($min= 1,$max=10),
			]);
		}
	}
}