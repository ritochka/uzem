<?php

class InterestAreasTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('interest_areas')->truncate();

		$interest_areas = array(
			
			['id'         => 1,
			'area' 		  => 'Software Engineering',
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')],
			['id'         => 2,
			'area' 		  => 'Data Mining',
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')],
			['id'         => 3,
			'area'        => 'Image Proccesing',
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')],
			['id'         => 4,
			'area'        => 'Parallel Computing',
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')],
			['id'         => 5,
			'area'        => 'Computer Vision',
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')]
	
		);

		// Uncomment the below to run the seeder
		DB::table('interest_areas')->insert($interest_areas);
	}
}
