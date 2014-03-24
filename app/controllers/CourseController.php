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

	public function Course($code)
	{
		$course = Course::where('code', $code)->first();

		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.course')->with('course', $course);
	}

	public function Agreement($code)
	{
		$course = Course::where('code', $code)->first();

		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.agreement')->with('course', $course);
	}

	public function Inclass($code)
	{
		$course = Course::where('code', $code)->first();

		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.class')->with('course', $course);
	}
}