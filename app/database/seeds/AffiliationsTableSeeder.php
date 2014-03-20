<?php

class AffiliationsTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('affiliations')->truncate();

		$affiliations = array(
			['id'         => 1,
			'institution' => 'Kyrgyzstan Turkey Manas University',
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')],
			['id'         => 2,
			'institution' => 'Middle East Tchnical University',
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')],
			['id'         => 3,
			'institution' => 'Gazi University',
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')],
			['id'         => 4,
			'institution' => 'Ankara University',
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')],
			['id'         => 5,
			'institution' => 'Hacetepe University',
			'created_at'  => date('Y-m-d H:i:s'),
			'updated_at'  => date('Y-m-d H:i:s')]
		);

		// Uncomment the below to run the seeder
		DB::table('affiliations')->insert($affiliations);
	}
}
