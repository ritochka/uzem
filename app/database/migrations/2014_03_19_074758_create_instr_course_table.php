<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstrCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instr_course', function(Blueprint $table)
		{
			$table->engine = 'InndoDB';
			$table->tinyInteger('id')->primary();
			$table->string('course_id', 100);
			$table->string('instr_id', 100);
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
		Schema::drop('instr_course');
	}

}