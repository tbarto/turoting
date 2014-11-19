<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelationshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relationships', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('worker_id')->unsigned();
			$table->integer('customer_id')->unsigned();
			$table->integer('job_id')->unsigned();
			$table->integer('review_id')->unsigned();
			$table->timestamps();

			$table->foreign('worker_id')->references('id')->on('users');
			$table->foreign('customer_id')->references('id')->on('users');
			$table->foreign('job_id')->references('id')->on('jobs');
			$table->foreign('review_id')->references('id')->on('reviews');
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('relationships');
	}

}
