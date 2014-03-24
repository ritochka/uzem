<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->string('id', 100)->unique()->primary();
			$table->string('code', 100);
			$table->string('name', 250);
			$table->tinyInteger('department_id')->nullable();
			$table->tinyInteger('semester')->default(0);
			$table->tinyInteger('credit')->default(0);
			$table->tinyInteger('credit_theory')->default(0);
			$table->tinyInteger('credit_practice')->default(0);
			$table->tinyInteger('status')->default(0);
			$table->mediumText('description');
			$table->text('syllabus');
			$table->text('agreement_text');
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
		Schema::drop('courses');
	}

}