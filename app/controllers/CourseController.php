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
		if(!Auth::check()) 
			return Redirect::to('login');
		if(!Auth::user()->hasRoles(['student', 'instructor', 'admin']))
			return Redirect::to('login')->with('message', 'you are not a student or an instructor');

		if(Auth::user()->hasEnrolled($code))
			return Redirect::to('/inclass/'.$code);

		$course = Course::where('code', $code)->first();

		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.agreement')->with('course', $course);
	}

	public function AgreementPost($code)
	{
		if(!Auth::check()) 
			return Redirect::to('login');
		if(!Auth::user()->hasRoles(['student', 'instructor', 'admin']))
			return Redirect::to('login')->with('message', 'you are not a student or an instructor');

		if(Auth::user()->hasEnrolled($code))
			return Redirect::to('/inclass/'.$code);
		
		$course = Course::where('code', $code)->first();

        Auth::user()->enroll()->attach($course->id);
		return Redirect::to('/inclass/'.$code);
	}

	public function Agreementreminder($code)
	{
		if(!Auth::user()->hasRoles(['student', 'instructor', 'admin']))
			return Redirect::to('login');

		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.agreementreminder')->with('course', $course);
	}

	public function Inclass($code)
	{
		if(!Auth::user()->hasRoles(['student', 'instructor', 'admin']))
			return Redirect::to('login');

		if(!Auth::user()->hasEnrolled($code))
			return Redirect::to('/agreement/courses/'.$code);

		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.class')->with('course', $course);
	}

	public function Awritten($code)
	{
		if(!Auth::user()->hasRoles(['student', 'instructor']))
			return Redirect::to('login');

		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.awritten')->with('course', $course);
	}

	public function Aprogramming($code)
	{
		if(!Auth::user()->hasRoles(['student', 'instructor']))
			return Redirect::to('login');

		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.aprogramming')->with('course', $course);
	}

	public function Aquizes($code)
	{
		if(!Auth::user()->hasRoles(['student', 'instructor']))
			return Redirect::to('login');

		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.aquizes')->with('course', $course);
	}

	public function Aexams($code)
	{
		if(!Auth::user()->hasRoles(['student', 'instructor']))
			return Redirect::to('login');

		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.aexams')->with('course', $course);
	}

	public function Video($code)
	{
		if(!Auth::user()->hasRoles(['student', 'instructor']))
			return Redirect::to('login');

		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.video')->with('course', $course);
	}

	public function Reading($code)
	{
		if(!Auth::user()->hasRoles(['student', 'instructor']))
			return Redirect::to('login');
		
		$course = Course::where('code', $code)->first();

		$this->layout=View::make('layouts.sidebar');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('course.reading')->with('course', $course);
	}
}