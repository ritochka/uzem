<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('departments', function(Blueprint $table)
		{
			$table->engine = 'InndoDB';
			$table->tinyInteger('id')->primary();
			$table->tinyInteger('faculty_id');
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
		Schema::drop('departments');
	}

}