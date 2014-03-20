<?php

class PublicationsTypeTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('publications_type')->truncate();

		$publications_type = array(
			
			['id'    => 1,
			 'name'  => 'Peer Reviewed'],
			['id'    => 2,
			 'name'  => 'Non-Peer Reviewed'],
			['id'    => 3,
			 'name'  => 'Reports'],
			['id'    => 4,
			 'name'  => 'Presentations, Papers and Posters'],
			['id'    => 5,
			 'name'  => 'in Progress']
	
		);

		// Uncomment the below to run the seeder
		DB::table('publications_type')->insert($publications_type);
	}
}
