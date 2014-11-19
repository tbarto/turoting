<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			// $table->string('provider');
			// $table->string('identifier');
			// $table->string('webSiteURL');
			// $table->string('profileURL');
			$table->string('photoURL');
			$table->string('displayName');
			$table->text('description');
			$table->string('firstName');
			$table->string('lastName');
			$table->string('gender');
			$table->string('language');
			// $table->integer('age');
			$table->integer('birthDay');
			$table->integer('birthMonth');
			$table->integer('birthYear');
			// $table->string('email');
			$table->string('emailVerified');
			$table->string('phone');
			// $table->string('address');
			$table->string('country');
			// $table->string('region');
			// $table->string('city');
			// $table->string('zip');
			// $table->string('username');
			// $table->string('coverInfoURL');
			$table->integer('citie_id')->unsigned();
			$table->integer('gu_id')->unsigned();
			$table->integer('dong_id')->unsigned();
			$table->integer ('price');
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('citie_id')->references('id')->on('cities');
			$table->foreign('gu_id')->references('id')->on('gus');
			$table->foreign('dong_id')->references('id')->on('dongs');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}

}
