<?php

class DepartmentController extends BaseController
{
	public function __construct()
	{
		$this->layout = 'layouts.default';

		$this->beforeFilter('csrf', ['on' => ['post', 'put', 'delete']]);
	}

	public function Departments()
	{
		$departments = Department::all();

		$this->layout->title = 'Department';
		$this->layout->content = View::make('department.departments')->with('departments', $departments);
	}

	public function Department($name)
	{
		$department = Department::where('name', $name)->first();

		$this->layout->title = $department->name;
		$this->layout->content = View::make('department.department')->with('department', $department);
	}
}