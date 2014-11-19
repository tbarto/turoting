<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_users', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('job_id')->unsigned();
			$table->integer('categorie_id')->unsigned();
			$table->integer('citie_id')->unsigned();
			$table->integer('gu_id')->unsigned();
			$table->integer('dong_id')->unsigned();
			$table->integer('review_num');
			$table->float('review_score');
			$table->timestamps();

			$table->foreign('job_id')->references('id')->on('jobs');
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('categorie_id')->references('id')->on('categories');
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
		Schema::drop('job_users');
	}

}
