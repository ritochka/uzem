<?php

class ReadingTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('reading')->truncate();

		$reading = array(
			['id'          => 1,
			'course_id'    => '52c43398d6a6b',
			'week'		   => 1,
			'title'		   => 'Mid-term 1',
			'reading_text' => 'do this and that and that',
			'url'		   => '/img/reading/book1.pdf',	
			'created_at'   => date('Y-m-d H:i:s'),
			'updated_at'   => date('Y-m-d H:i:s')],
			['id'          => 2,
			'course_id'    => '52c43398d6ac0',
			'week'	       => 1,
			'title'		   => 'Mid-term 1',
			'reading_text' => 'do this and that and that',
			'url'		   => '/img/reading/book2.pdf',	
			'created_at'   => date('Y-m-d H:i:s'),
			'updated_at'   => date('Y-m-d H:i:s')],
			['id'          => 3,
			'course_id'    => '52c43398d6ac0',
			'week'		   => 2,
			'title'		   => 'Mid-term 2',
			'reading_text' => 'do this and that and that',
			'url'		   => '/img/reading/book3.pdf',	
			'created_at'   => date('Y-m-d H:i:s'),
			'updated_at'   => date('Y-m-d H:i:s')]
			
		);

		// Uncomment the below to run the seeder
		DB::table('reading')->insert($reading);
	}

}
