<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('CoursesTableSeeder');
		$this->call('DiscussionsTableSeeder');
		$this->call('FacultiesTableSeeder');
		$this->call('DepartmentsTableSeeder');
		$this->call('InstrCourseTableSeeder');
		$this->call('StudentCourseTableSeeder');
		$this->call('TeachersTableSeeder');
		$this->call('AffiliationsTableSeeder');
		$this->call('InterestAreasTableSeeder');
		$this->call('InterestAreasTeachersTableSeeder');
		$this->call('PublicationsTableSeeder');
		$this->call('PublicationsTypeTableSeeder');
		$this->call('StaffEducationTableSeeder');
		$this->call('DegreesTableSeeder');
		$this->call('StudentsTableSeeder');
		$this->call('NewsTableSeeder');
		$this->call('VideoTableSeeder');
		$this->call('AprogrammingTableSeeder');
		$this->call('AwrittenTableSeeder');
		$this->call('AquizesTableSeeder');
		$this->call('AexamsTableSeeder');
		$this->call('ReadingTableSeeder');
	}

}