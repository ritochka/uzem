<?php

class StudentCourseTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('student_course')->truncate();

		$student_course = array(
			['id'        => 1,
			'course_id'  => '52c43398d6a6b',
			'student_id'   => '52bee44d617ff',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => 2,
			'course_id'  => '52c43398d6ac0',
			'student_id'   => '52bee44d617ff',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')]
			
		);

		// Uncomment the below to run the seeder
		DB::table('student_course')->insert($student_course);
	}

}
