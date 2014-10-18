<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'slider', function(Blueprint $table){
				$table->increments('id');
				$table->unsignedInteger('language_id');
				$table->foreign('language_id')->references('id')->on('language');
				$table->integer('position')->nullable();
				$table->string('filename', 255);
				$table->string('name', 255)->nullable();
				$table->text('description')->nullable();
				$table->unsignedInteger('slider_album_id')->nullable();
				$table->foreign('slider_album_id')->references('id')->on('slider_album')->onDelete('set null');
				$table->unsignedInteger('user_id')->nullable();
				$table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
				$table->unsignedInteger('user_id_edited')->nullable();
				$table->foreign('user_id_edited')->references('id')->on('users')->onDelete('set null');
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
		Schema::drop('slider');
	}

}
