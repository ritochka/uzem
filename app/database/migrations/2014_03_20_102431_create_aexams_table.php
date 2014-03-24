<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAexamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aexams', function(Blueprint $table)
		{
			$table->engine = 'InndoDB';
			$table->integer('id')->primary();
			$table->string('course_id', 100);
			$table->tinyInteger('week');
			$table->string('title', 100);
			$table->text('assignment');
			$table->string('url', 255);
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
		Schema::drop('aexams');
	}

}