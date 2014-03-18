<?php

class FacultiesTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('courses')->truncate();

		$faculties = array(
			['id'   	      => 6,
			'name'        	  => 'Engineering',
			'en'        	  => 'Engineering',
			'kg'        	  => 'Инженердик',
			'ru'        	  => 'Инженерия',
			'tr'        	  => 'Mühendislik',
			'created_at'  	  => date('Y-m-d H:i:s'),
			'updated_at'  	  => date('Y-m-d H:i:s')],
			['id'   	      => 5,
			'name'        	  => 'Communication',
			'en'        	  => 'Communication',
			'kg'        	  => 'Коммуникациялык',
			'ru'        	  => 'Коммуникация',
			'tr'        	  => 'İletişim',
			'created_at'  	  => date('Y-m-d H:i:s'),
			'updated_at'  	  => date('Y-m-d H:i:s')],
		);

		// Uncomment the below to run the seeder
		DB::table('faculties')->insert($faculties);
	}

}