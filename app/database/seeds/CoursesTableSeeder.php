<?php

class CoursesTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('courses')->truncate();

		$courses = array(
			['id'   	      => '52c43398d6a6b',
			'code'      	  => 'AR500',
			'name'        	  => 'Action Research for Teachers',
			'department_id'   => 24,
			'semester'    	  => 1,
			'credit'	  	  => 3,
			'credit_theory'   => 2,
			'credit_practice' => 1,
			'status'		  => 1,
			'description' 	  => 'Action Research for Teachers, online teaching',
			'syllabus'		  => 'here goes syllabus',
			'agreement_text'  => ' will register for only one account.
									My answers to homework, quizzes and exams will be my own work (except for assignments that explicitly permit collaboration).
									I will not make solutions to homework, quizzes or exams available to anyone else. This includes both solutions written by me, as well as any official solutions provided by the course staff.
									I will not engage in any other activities that will dishonestly improve my results or dishonestly improve/hurt the results of others.',
			'created_at'  	  => date('Y-m-d H:i:s'),
			'updated_at'  	  => date('Y-m-d H:i:s')],
			['id'         	  => '52c43398d6ac0',
			'code'       	  => 'CE100',
			'name'        	  => 'Introduction to computer sciences',
			'department_id'   => 25,
			'semester'    	  => 1,
			'credit'	  	  => 7,
			'credit_theory'   => 4,
			'credit_practice' => 3,
			'status'		  => 1,
			'description' 	  => 'Introduction to computer sciences, and much more',
			'syllabus'		  => 'here goes syllabus',
			'agreement_text'  => ' will register for only one account.
									My answers to homework, quizzes and exams will be my own work (except for assignments that explicitly permit collaboration).
									I will not make solutions to homework, quizzes or exams available to anyone else. This includes both solutions written by me, as well as any official solutions provided by the course staff.
									I will not engage in any other activities that will dishonestly improve my results or dishonestly improve/hurt the results of others.',
			'created_at'  	  => date('Y-m-d H:i:s'),
			'updated_at'  	  => date('Y-m-d H:i:s')]
		);

		// Uncomment the below to run the seeder
		DB::table('courses')->insert($courses);
	}

}