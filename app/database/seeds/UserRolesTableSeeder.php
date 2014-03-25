<?php

class UserRolesTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('video')->truncate();

		$user_roles = array(
			['id'        => 1,
			'user_id'    => '52bee44d472ed',
			'role_id'	 => 1],
			['id'        => 2,
			'user_id'    => '52bee44d472ed',
			'role_id'	 => 3],
			['id'        => 3,
			'user_id'    => '52bee44d472ec',
			'role_id'	 => 1,
			],
			['id'        => 4,
			'user_id'    => '52bee44d617fc',
			'role_id'	 => 2,
			],
			['id'        => 5,
			'user_id'    => '52bee44d617ff',
			'role_id'	 => 2,
			]
			
		);

		// Uncomment the below to run the seeder
		DB::table('user_roles')->insert($user_roles);
	}

}
