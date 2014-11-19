<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		/*
		|--------------------------------------------------------------------------
		| db seed order - david/20141114
		|--------------------------------------------------------------------------
		|
		| !IMPORTANT TO KEEP THE ORDER
		|
		*/
		$this->call('CategoriesTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('ReviewsTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('CitiesTableSeeder');

		$this->call('RoleUsersTableSeeder');
		$this->call('JobsTableSeeder');
		$this->call('RelationshipsTableSeeder');
		$this->call('PostsTableSeeder');
		$this->call('MessagesTableSeeder');
		$this->call('GusTableSeeder');
		$this->call('DongsTableSeeder');
		$this->call('ProfilesTableSeeder');
		$this->call('JobUsersTableSeeder');
	}
}