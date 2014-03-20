<?php

class InstrCourseTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('instr_course')->truncate();

		$instr_course = array(
			['id'        => 1,
			'course_id'  => '52c43398d6a6b',
			'instr_id'   => '52bee44d472ed',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => 2,
			'course_id'  => '52c43398d6ac0',
			'instr_id'   => '52bee44d617fc',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => 3,
			'course_id'  => '52c43398d6ac0',
			'instr_id'   => '52bee44d472ed',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')]
			
		);

		// Uncomment the below to run the seeder
		DB::table('instr_course')->insert($instr_course);
	}

}
