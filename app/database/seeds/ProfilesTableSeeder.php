<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProfilesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		Eloquent::unguard();
		foreach(range(1, 25) as $index)
		{
			//set name for firstName and displayName
			$name = $faker->firstName;
			//set values for gus and dongs
			if($index<16){
				$guValue = 3;
				$lowValue = 1; 
				$highValue=8;
			}
			else{
				$guValue=4;
				$lowValue=9;
				$highValue=17;
			}
			
			Profile::create([
				'user_id' => $index,
				//provider
				//identifier
				//websiteURL
				//profileURL
				'photoURL'=>'/images/user_images/myPhoto.jpg',
				'displayName'=>$name,
				'description'=>$faker->text($maxNbChars = 200),
				'firstName'=>$name,
				'lastName'=>$faker->lastName,
				'gender'=> rand(0, 1) ? 'male' : 'female',
				'language'=>'English',
				//age=>?	
				'birthDay'=> $faker->numberBetween($min = 1, $max = 28),
				'birthMonth'=> $faker->numberBetween($min = 1, $max = 12),
				'birthYear'=> $faker->numberBetween($min = 1960, $max = 2005),
				//email?
				'emailVerified'=>1,
				'phone'=>$faker->randomNumber($nbDigits = 11),
				//address
				'country'=>'Korea',
				//region
				//city
				//zip
				//username??
				//coverInfoUrl
				'created_at'=>$faker->dateTime($max ='now'),
				'updated_at'=>$faker->dateTime($max ='now'),
				'citie_id'=>1,
				'gu_id'=>$guValue,
				'dong_id'=>$faker->numberBetween($min = $lowValue, $max = $highValue),
				'price'=>$faker->numberBetween($min = 20000, $max = 60000)

			]);
		}
	}

}