<?php

class UsersTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('users')->truncate();

		$users = array(
			['id'        => '52bee44d472ed',
			'email'      => 'nurchin@gmail.com',
			'password'   => Hash::make('admin'),
			'firstname'  => 'Chyngyz',
			'lastname'   => 'Begimkulov',
			'position'	 => 1,
			'active'     => 1,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => '52bee44d472ec',
			'email'      => 'ritochkina@gmail.com',
			'password'   => Hash::make('ritochka'),
			'firstname'  => 'Rita',
			'lastname'   => 'Ismailova',
			'position'		 => 1,
			'active'     => 1,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => '52bee44d617fc',
			'email'      => 'cbega@live.com',
			'password'   => Hash::make('django'),
			'firstname'  => 'Django',
			'lastname'   => 'Unchained',
			'position'	 => 2,
			'active'     => 1,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => '52bee44d617ff',
			'email'      => 'student@live.com',
			'password'   => Hash::make('student'),
			'firstname'  => 'Student',
			'lastname'   => 'Studentsurname',
			'position'	 => 4,
			'active'     => 1,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')]
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}
}
