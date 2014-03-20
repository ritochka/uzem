<?php

class AexamsTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('aexams')->truncate();

		$aexams = array(
			['id'        => 1,
			'course_id'  => '52c43398d6a6b',
			'title'		 => 'Mid-term 1',
			'assignment' => 'do this and that and that',
			'url'		 => '/img/exams/exam1.pdf',	
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => 2,
			'course_id'  => '52c43398d6ac0',
			'title'		 => 'Mid-term 1',
			'assignment' => 'do this and that and that',
			'url'		 => '/img/exams/exam2.pdf',	
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => 3,
			'course_id'  => '52c43398d6ac0',
			'title'		 => 'Mid-term 2',
			'assignment' => 'do this and that and that',
			'url'		 => '/img/exams/exam3.pdf',	
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')]
			
		);

		// Uncomment the below to run the seeder
		DB::table('aexams')->insert($aexams);
	}

}
