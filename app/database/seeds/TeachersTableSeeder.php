<?php

class TeachersTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('teachers')->truncate();

		$teachers = array(
			['id'         => '52bee44d472ed',
			'affiliation_id' => 1,
			'departament' => 24,
			'office'  	  => 'Communication, B101',
			'phone'   	  => '+996312000000',
			'web'		  => 'www.manas.edu.kg',
			'picture'     => '/img/pictures/123.jpg',
			'cv'		  =>	'/img/cv/123.pdf',
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')],
			['id'         => '52bee44d617fc',
			'affiliation_id' => 1,
			'departament' => 24,
			'office'  	  => 'Communication, B101',
			'phone'   	  => '+996312000001',
			'web'		  => 'www.manas.edu.kg',
			'picture'     => '/img/pictures/1234.jpg',
			'cv'		  =>	'/img/cv/1234.pdf',
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')]
		
		);

		// Uncomment the below to run the seeder
		DB::table('teachers')->insert($teachers);
	}
}
