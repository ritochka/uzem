<?php

class DiscussionsTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('courses')->truncate();

		$discussions = array(
			['id'        => '52c43498d6a6b',
			'title'      => 'Action Research for Teachers',
			'content'    => 'Action Research for Teachers, online teaching',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => '52c43498d6ac0',
			'title'      => 'Introduction to computer sciences',
			'content'    => 'Introduction to computer sciences, and much more',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')]
		);

		// Uncomment the below to run the seeder
		DB::table('discussions')->insert($discussions);
	}

}
