<?php

class VideoTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('video')->truncate();

		$video = array(
			['id'        => 1,
			'course_id'  => '52c43398d6a6b',
			'title'		 => 'Week 1 video lesson',
			'description'=> 'do this and that and that',
			'url'		 => '/img/video/video1.mp4'	,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => 2,
			'course_id'  => '52c43398d6ac0',
			'title'		 => 'Week 1 video lesson',
			'description'=> 'do this and that and that',
			'url'		 => '/img/video/video2.mp4',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')],
			['id'        => 3,
			'course_id'  => '52c43398d6ac0',
			'title'		 => 'Week 2 video lesson',
			'description'=> 'do this and that and that',
			'url'		 => '/img/video/video3.mp4',	
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')]
			
		);

		// Uncomment the below to run the seeder
		DB::table('video')->insert($video);
	}

}
