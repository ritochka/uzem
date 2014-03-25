<?php

	class AcademicTitlesTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('academictitles')->truncate();

		$academictitles = array(
			['id'    => 1,
			'title'  => 'Research Assistant'],
			['id'    => 2,
			'title'  => 'Assistant Professor'],
			['id'    => 3,
			'title'  => 'Associate Professor'],
			['id'    => 4,
			'title'  => 'Professor']
			
		);

		// Uncomment the below to run the seeder
		DB::table('academic_titles')->insert($academictitles);
	}

}
