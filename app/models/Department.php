<?php

class Department extends Eloquent
{
	public $table;

	public function __construct()
	{
		$this->table = 'departments';
	}

	public function faculty()
	{
		return $this->belongsTo('Faculty', 'faculty_id');
	}

	public function courses()
	{
		return $this->hasMany('Course', 'department_id');
	}

	public function teachers()
	{
		return $this->hasMany('Teacher', 'department_id');
	}

	public function getName()
	{
		return $this[Config::get('app.locale')];
	}

}