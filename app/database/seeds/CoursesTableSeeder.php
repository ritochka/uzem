<?php

class CoursesTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('courses')->truncate();

		$courses = array(
			['id'         => '52c43398d6a6b',
			'code'        => 'AR500',
			'name'        => 'Action Research for Teachers',
			'description' => 'Action Research for Teachers, online teaching',
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')],
			['id'         => '52c43398d6ac0',
			'code'        => 'CE100',
			'name'        => 'Introduction to computer sciences',
			'description' => 'Introduction to computer sciences, and much more',
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')]
		);

		// Uncomment the below to run the seeder
		DB::table('courses')->insert($courses);
	}

}
