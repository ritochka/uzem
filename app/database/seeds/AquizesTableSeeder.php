<?php

class AquizesTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('aquizes')->truncate();

		$aquizes = array(
			['id'        => 1,
			'course_id'  => '52c43398d6a6b',
			'week'		 => 1,
			'title'		 => 'Quiz 1',
			'assignment' => 'do this and that and that',
			'url'		 => '/img/quiz/quiz1.pdf',	
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => 2,
			'course_id'  => '52c43398d6ac0',
			'week'		 => 1,
			'title'		 => 'Quiz 1',
			'assignment' => 'do this and that and that',
			'url'		 => '/img/quiz/quiz2.pdf',	
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => 3,
			'course_id'  => '52c43398d6ac0',
			'week'		 => 2,
			'title'		 => 'Quiz 2',
			'assignment' => 'do this and that and that',
			'url'		 => '/img/quiz/quiz3.pdf',	
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')]
			
		);

		// Uncomment the below to run the seeder
		DB::table('aquizes')->insert($aquizes);
	}

}
