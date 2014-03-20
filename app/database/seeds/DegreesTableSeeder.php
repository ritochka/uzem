<?php

class DegreesTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('degrees')->truncate();

		$degrees = array(
			['id'    => 1,
			'degree' => 'B.S.'],
			['id'    => 2,
			'degree' => 'B.A.'],
			['id'    => 3,
			'degree' => 'M.S.'],
			['id'    => 4,
			'degree' => 'M.A.'],
			['id'    => 5,
			'degree' => 'M.B.A.'],
			['id'    => 6,
			'degree' => 'Ph.D.']			
		);

		// Uncomment the below to run the seeder
		DB::table('degrees')->insert($degrees);
	}

}
