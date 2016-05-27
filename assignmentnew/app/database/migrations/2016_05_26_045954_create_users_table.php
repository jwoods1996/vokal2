<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
 		$table->increments('id');
		$table->string('email')->unique();
		$table->string('password')->index();
		$table->string('fullname');
		$table->string('dob');
		$table->string('image');
 		$table->string('remember_token')->nullable();
 		$table->timestamps();
		});

		Schema::create('friends',
		function($table)
		{
			$table->increments('id');
			$table->integer('user1_id');
			$table->integer('user2_id');
 			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}