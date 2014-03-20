<?php

class StaffEducationTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('staff_education')->truncate();

		$staff_education = array(
			['id'		  	 => 1,
			'user_id'     	 => '52bee44d472ed',
			'institution_id' => 1,
			'department'     => 'Computer Engineering',
			'level'  		 => 1,
			'graduated'  	 => '2005'],
			['id'		  	 => 2,
			'user_id'     	 => '52bee44d472ed',
			'institution_id' => 2,
			'department'     => 'Computer Education and Instructional Technologies',
			'level'  		 => 3,
			'graduated'  	 => '2008'],
			['id'		  	 => 3,
			'user_id'     	 => '52bee44d472ed',
			'institution_id' => 2,
			'department'     => 'Computer Education and Instructional Technologies',
			'level'  		 => 6,
			'graduated'  	 => 'ongoing'],
			['id'			 => 4,
			'user_id'        => '52bee44d617fc',
			'institution_id' => 1,
			'department'     => 'Computer Engineering',
			'level'  		 => 1,
			'graduated'  	 => '2005'],
			['id'		  	 => 5,
			'user_id'     	 => '52bee44d617fc',
			'institution_id' => 2,
			'department'     => 'Computer Engineering',
			'level'  		 => 3,
			'graduated'  	 => '2008'],
			['id'		  	 => 6,
			'user_id'     	 => '52bee44d617fc',
			'institution_id' => 2,
			'department'     => 'EE Engineering',
			'level'  		 => 6,
			'graduated'  	 => 'ongoing'],
			
		);

		// Uncomment the below to run the seeder
		DB::table('staff_education')->insert($staff_education);
	}
}
