<?php

class DongsTableSeeder extends Seeder {

	public function run(){

		Eloquent::unguard();
		/*
		|--------------------------------------------------------------------------
		| dongs in gwangjin and seodaemun - david/20141114
		|--------------------------------------------------------------------------
		|
		| add more sample here
		|
		*/
		$gwangjin = DB::table('gus')
			->select('id')
			->where('name','=','Gwangjin')
			->first();

		$gwangjin_gu_ID = $gwangjin->id;

		$seodaemun = DB::table('gus')
			->select('id')
			->where('name','=','Seodaemun')
			->first();
		$seodaemun_gu_ID = $seodaemun->id;

		Dong::create([
			'name'=>'Gunja',
			'lat'=> 37.5550932,
			'lng'=> 127.075849,
			'gu_id' =>$gwangjin_gu_ID
		]);
		Dong::create([
			'name'=>'Hwayang',
			'lat'=> 37.5435547,
			'lng'=> 127.0734559,
			'gu_id' =>$gwangjin_gu_ID
		]);
		Dong::create([
			'name'=>'Gwangjang',
			'lat'=> 37.546955,
			'lng'=> 127.10323549,
			'gu_id' =>$gwangjin_gu_ID
		]);
		Dong::create([
			'name'=>'Guui',
			'lat'=> 37.537145,
			'lng'=> 127.086135,
			'gu_id' =>$gwangjin_gu_ID
		]);
		Dong::create([
			'name'=>'Jayang',
			'lat'=> 37.5324005,
			'lng'=> 127.07158,
			'gu_id' =>$gwangjin_gu_ID
		]);
		Dong::create([
			'name'=>'Junggok',
			'lat'=> 37.5626197,
			'lng'=> 127.0853672,
			'gu_id' =>$gwangjin_gu_ID
		]);
		Dong::create([
			'name'=>'Neung',
			'lat'=> 37.55049,
			'lng'=> 127.0814368,
			'gu_id' =>$gwangjin_gu_ID
		]);
		Dong::create([
			'name'=>'Noyu',
			'lat'=> 37.5384843,
			'lng'=> 127.0822938,
			'gu_id' =>$gwangjin_gu_ID
		]);

		Dong::create([
			'name'=>'Sinchon',
			'lat'=> 37.559479,
			'lng'=> 126.943583,
			'gu_id' =>$seodaemun_gu_ID
		]);
		Dong::create([
			'name'=>'Bukgajwa',
			'lat'=> 37.5784186,
			'lng'=> 126.909956,
			'gu_id' =>$seodaemun_gu_ID
		]);
		Dong::create([
			'name'=>'Bugahyeon',
			'lat'=> 37.560967,
			'lng'=> 126.954268,
			'gu_id' =>$seodaemun_gu_ID
		]);
		Dong::create([
			'name'=>'Cheonyeon',
			'lat'=> 37.571062,
			'lng'=> 126.95902,
			'gu_id' =>$seodaemun_gu_ID
		]);
		Dong::create([
			'name'=>'Namgajwa',
			'lat'=> 37.574345,
			'lng'=> 126.918897,
			'gu_id' =>$seodaemun_gu_ID
		]);
		Dong::create([
			'name'=>'Chunghyeon',
			'lat'=> 37.5628962,
			'lng'=> 126.962359,
			'gu_id' =>$seodaemun_gu_ID
		]);
		Dong::create([
			'name'=>'Hongeun',
			'lat'=> 37.58713,
			'lng'=> 126.931975,
			'gu_id' =>$seodaemun_gu_ID
		]);
		Dong::create([
			'name'=>'Hongje',
			'lat'=> 37.5855112,
			'lng'=> 126.948983,
			'gu_id' =>$seodaemun_gu_ID
		]);
		Dong::create([
			'name'=>'Yeonhui',
			'lat'=> 37.571797,
			'lng'=> 126.9325254,
			'gu_id' =>$seodaemun_gu_ID
		]);
	}
}