<?php

class Course extends Eloquent
{
	public $table;

	public function __construct()
	{
		$this->table = 'courses';
	}

	public function department()
	{
		return $this->belongsTo('Department', 'department_id');
	}
}