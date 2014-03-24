<?php

class AprogrammingTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('aprogramming')->truncate();

		$aprogramming = array(
			['id'        => 1,
			'course_id'  => '52c43398d6a6b',
			'week'		 => 1,
			'title'		 => 'Programming Assignment 1',
			'assignment' => 'do this and that and that',
			'url'		 => '/img/prog_assign/prog_assign1.pdf',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => 2,
			'course_id'  => '52c43398d6ac0',
			'week'		 => 1,
			'title'		 => 'Programming Assignment 1',
			'assignment' => 'do this and that and that',
			'url'		 => '/img/prog_assign/prog_assign2.pdf',	
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => 3,
			'course_id'  => '52c43398d6ac0',
			'week'		 => 2,
			'title'		 => 'Programming Assignment 2',
			'assignment' => 'do this and that and that',
			'url'		 => '/img/prog_assign/prog_assign3.pdf',	
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')]
			
		);

		// Uncomment the below to run the seeder
		DB::table('aprogramming')->insert($aprogramming);
	}

}
