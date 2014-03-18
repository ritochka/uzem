<?php

class CourseController extends BaseController
{
	public function __construct()
	{
		$this->layout = 'layouts.default';

		$this->beforeFilter('csrf', ['on' => ['post', 'put', 'delete']]);
	}

	public function Courses()
	{
		$courses = Course::all();

		$this->layout->title = 'Courses';
		$this->layout->content = View::make('course.courses')->with('courses', $courses);
	}
}