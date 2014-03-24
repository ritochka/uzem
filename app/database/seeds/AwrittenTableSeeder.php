<?php

class AwrittenTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('awritten')->truncate();

		$awritten = array(
			['id'        => 1,
			'course_id'  => '52c43398d6a6b',
			'week'		 => 1,
			'title'		 => 'Written Assignment 1',
			'assignment' => 'do this and that and that',
			'url'		 => '/img/awritten/hw1.pdf',	
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => 2,
			'course_id'  => '52c43398d6ac0',
			'week'		 => 1,
			'title'		 => 'Written Assignment 1',
			'assignment' => 'do this and that and that',
			'url'		 => '/img/awritten/hw2.pdf',	
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => 3,
			'course_id'  => '52c43398d6ac0',
			'week'		 => 2,
			'title'		 => 'Written Assignment 2',
			'assignment' => 'do this and that and that',
			'url'		 => '/img/awritten/hw3.pdf',	
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')]
			
		);

		// Uncomment the below to run the seeder
		DB::table('awritten')->insert($awritten);
	}

}
