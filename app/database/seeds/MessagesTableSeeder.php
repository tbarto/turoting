<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MessagesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		Eloquent::unguard();
		/*
		|--------------------------------------------------------------------------
		| message sample - david/20141114
		|--------------------------------------------------------------------------
		|
		| add more sample here
		| 
		*/
		foreach(range(1, 100) as $index)
		{
			Message::create([
				'from_id' => $faker->numberBetween($min= 1,$max=25),
    			'content'=>$faker->text($maxNbChars = 200),
    			'read' => 0,
    			'user_id' => $faker->numberBetween($min= 1,$max=25),
    			'created_at'=>$faker->dateTime($max ='now'),
    			'updated_at'=>$faker->dateTime($max ='now')
			]);
		}
	}

}