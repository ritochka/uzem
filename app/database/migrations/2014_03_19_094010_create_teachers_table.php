<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teachers', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->string('id', 100)->unique()->primary();
			$table->tinyInteger('affiliation_id');
			$table->tinyInteger('department_id');
			$table->string('office', 100);
			$table->string('phone', 100);
			$table->string('web', 100);
			$table->string('picture', 100);
			$table->string('cv', 100);
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
		Schema::drop('teachers');
	}

}