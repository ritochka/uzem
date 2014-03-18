<?php

class FacultyController extends BaseController
{
	public function __construct()
	{
		$this->layout = 'layouts.default';

		$this->beforeFilter('csrf', ['on' => ['post', 'put', 'delete']]);
	}

	public function Faculties()
	{
		$faculties = Faculty::all();

		$this->layout->title = 'Faculties';
		$this->layout->content = View::make('faculty.faculties')->with('faculties', $faculties);
	}

	public function Faculty($name)
	{
		$faculty = Faculty::where('name', $name)->first();

		$this->layout->title = $faculty->name;
		$this->layout->content = View::make('faculty.faculty')->with('faculty', $faculty);
	}
}