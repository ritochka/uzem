<?php

class InterestAreasTeachersTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('interest_areas_teachers')->truncate();

		$interest_areas_teachers = array(
			['id'        => 1,
			'area_id'  	 => 1,
			'instr_id'   => '52bee44d472ed',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => 2,
			'area_id'    => 2,
			'instr_id'   => '52bee44d617fc',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => 3,
			'area_id'    => 3,
			'instr_id'   => '52bee44d472ed',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')]
			
		);

		// Uncomment the below to run the seeder
		DB::table('interest_areas_teachers')->insert($interest_areas_teachers);
	}

}
