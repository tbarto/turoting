<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ReviewsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		Eloquent::unguard();
		/*
		|--------------------------------------------------------------------------
		| Reviews sample - david/20141114
		|--------------------------------------------------------------------------
		|
		| add more sample here
		|
		*/
		foreach (range(1, 10) as $index) 
		{
			Review::create([
	    		'content'=>$faker->text($maxNbChars = 200),
	    		'score' => $faker->numberBetween($min= 1,$max=5),
	    		'created_at'=>time(),
	    		'updated_at'=>time()
			]);
		}
	}
}