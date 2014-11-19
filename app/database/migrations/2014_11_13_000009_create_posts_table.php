<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->text('content');
			$table->integer('user_id')->unsigned();
			$table->integer('job_id')->unsigned();
			$table->integer('post_type');
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('job_id')->references('id')->on('jobs');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
