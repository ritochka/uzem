<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faculties', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->tinyInteger('id')->unique()->primary();
			$table->string('name', 250);
			$table->string('kg', 250);
			$table->string('ru', 250);
			$table->string('en', 250);
			$table->string('tr', 250);
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
		Schema::drop('faculties');
	}

}