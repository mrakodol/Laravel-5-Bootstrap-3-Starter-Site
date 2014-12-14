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
		Schema::create('users', function(Blueprint $table)
		{
		    $table->engine = 'InnoDB';
		    $table->increments('id');
	            $table->string('name', 100);
	            $table->string('email')->unique();
	            $table->string('password', 60);
	            $table->string('confirmation_code');
	            $table->string('remember_token')->nullable();
	            $table->boolean('confirmed')->default(false);
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
		Schema::drop('users');
	}

}
