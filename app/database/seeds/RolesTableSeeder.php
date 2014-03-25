<?php

class RolesTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('video')->truncate();

		$roles = array(
			['id'        => 1,
			'name'       => 'teacher'],
			['id'        => 2,
			'name'  => 'student'],
			['id'        => 3,
			'name'  => 'admin']
		);

		// Uncomment the below to run the seeder
		DB::table('roles')->insert($roles);
	}

}
