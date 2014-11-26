<?php

class FacultyController extends BaseController
{


	public function __construct()
	{
		$this->layout = 'layouts.default';

		$this->beforeFilter('csrf', ['on' => ['post', 'put', 'delete']]);
	}

	public function Home()
	{
		$faculties = Faculty::all();

		$this->layout->title = trans('default.Faculties');
		$this->layout->content = View::make('faculty.home')->with('faculties', $faculties);
	}

	public function Faculty($name)
	{
		$faculty = Faculty::where('name', '=', $name)->firstOrFail();

		$this->layout->title = trans('default.Faculty');
		$this->layout->content = View::make('faculty.faculty')->with('faculty', $faculty);
	}

	public function Faculties()
	{
		$faculties = Faculty::all();

		$this->layout->title = trans('default.Faculty');
		$this->layout->content = View::make('faculty.faculties')->with('faculties', $faculties);		
	}

}