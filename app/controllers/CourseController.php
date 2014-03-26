<?php

class CourseController extends BaseController
{
	public function __construct()
	{
		$this->layout = 'layouts.default';

		$this->beforeFilter('csrf', ['on' => ['post', 'put', 'delete']]);
		$this->beforeFilter('auth', ['on' => ['post', 'put', 'delete']]);
	}

	public function Courses()
	{
		// $courses = Course::all();
		$faculties = Faculty::all();

		$this->layout->title = 'Courses';
		$this->layout->content = View::make('course.courses')->with('faculties', $faculties);
	}

	public function Course($code)
	{
		$course = Course::where('code', $code)->first();

		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.course')->with('course', $course);
	}

	public function Agreement($code)
	{
		if(!Auth::user()->hasRoles(['student', 'teacher']))
			return Redirect::to('login');

		$course = Course::where('code', $code)->first();

		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.agreement')->with('course', $course);
	}

	public function Agreementreminder($code)
	{
		if(!Auth::user()->hasRoles(['student', 'teacher']))
			return Redirect::to('login');

		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.agreementreminder')->with('course', $course);
	}

	public function Inclass($code)
	{
		if(!Auth::user()->hasRoles(['student', 'teacher']))
			return Redirect::to('login');

		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.class')->with('course', $course);
	}

	public function Awritten($code)
	{
		if(!Auth::user()->hasRoles(['student', 'teacher']))
			return Redirect::to('login');

		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.awritten')->with('course', $course);
	}

	public function Aprogramming($code)
	{
		if(!Auth::user()->hasRoles(['student', 'teacher']))
			return Redirect::to('login');

		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.aprogramming')->with('course', $course);
	}

	public function Aquizes($code)
	{
		if(!Auth::user()->hasRoles(['student', 'teacher']))
			return Redirect::to('login');

		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.aquizes')->with('course', $course);
	}

	public function Aexams($code)
	{
		if(!Auth::user()->hasRoles(['student', 'teacher']))
			return Redirect::to('login');

		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.aexams')->with('course', $course);
	}

	public function Video($code)
	{
		if(!Auth::user()->hasRoles(['student', 'teacher']))
			return Redirect::to('login');

		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.video')->with('course', $course);
	}

	public function Reading($code)
	{
		if(!Auth::user()->hasRoles(['student', 'teacher']))
			return Redirect::to('login');
		
		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.reading')->with('course', $course);
	}
}