<?php

class StudentsTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('students')->truncate();

		$students = array(
			['id'        => '52bee44d617ff',
			'student_id' => '2011.00000',
			'start_year' => '2011',
			'department' => 24,
			'picture'    => '/img/pic/12345.jpg',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')]
		);

		// Uncomment the below to run the seeder
		DB::table('students')->insert($students);
	}
}
