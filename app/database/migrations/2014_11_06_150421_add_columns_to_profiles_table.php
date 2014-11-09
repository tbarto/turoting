<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('profiles', function($table){
    		$table->integer('citie_id');
    		$table->integer('gu_id');
    		$table->integer('dong_id');
    		$table->integer('price');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table){
    		$table->dropColumn('citie_id');
    		$table->dropColumn('gu_id');
    		$table->dropColumn('dong_id');
    		$table->dropColumn('price');
		});
	}

}
