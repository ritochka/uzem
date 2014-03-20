<?php

class PublicationsTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('publications')->truncate();

		$publications = array(
			
			['id'         => 1,
			'instr_id'    => '52bee44d472ed',
			'title' 	  => 'Article obtained from thesis 1',
			'type'		  => 1,
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')],
			['id'         => 2,
			'instr_id'    => '52bee44d472ed',
			'title' 	  => 'Article obtained from thesis 2',
			'type'		  => 1,
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')],
			['id'         => 3,
			'instr_id'    => '52bee44d617fc',
			'title'       => 'Article obtained from thesis 1',
			'type'		  => 1,
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')],
			['id'         => 4,
			'instr_id'    => '52bee44d617fc',
			'title'       => 'Article obtained from thesis 3',
			'type'		  => 2,
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')],
			['id'         => 5,
			'instr_id'    => '52bee44d617fc',
			'title'       => 'Article obtained from thesis 4',
			'type'		  => 3,
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')]
	
		);

		// Uncomment the below to run the seeder
		DB::table('publications')->insert($publications);
	}
}