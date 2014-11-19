<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		Eloquent::unguard();
		/*
		|--------------------------------------------------------------------------
		| roles sample - david/20141114
		|--------------------------------------------------------------------------
		|
		| add more sample here
		|
		*/
		foreach (range(1, 10) as $index) {
			Post::create([
				'content'=>$faker->text($maxNbChars = 200),
				'user_id'=>$faker->numberBetween($min= 1,$max=25),
				'job_id'=>$faker->numberBetween($min= 1,$max=4),
				'post_type'=>$faker->numberBetween($min= 1,$max=4),
			]);
		}
	}

}