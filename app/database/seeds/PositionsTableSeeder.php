<?php

class PositionsTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('positions')->truncate();

		$positions = array(
			['id'    => 1,
			'name'   => 'Academic'],
			['id'    => 2,
			'name'   => 'Assistant'],
			['id'    => 3,
			'name'   => 'Administrative'],
			['id'    => 4,
			'name'   => 'Student']
		);

		// Uncomment the below to run the seeder
		DB::table('positions')->insert($positions);
	}

}
