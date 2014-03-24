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

	public function instructors()
	{
		return $this->belongsToMany('User', 'instr_course', 'course_id', 'instr_id');
	}

	public function awrittens()
	{
		return $this->hasMany('Awritten', 'course_id');
	}

	public function aprogrammings()
	{
		return $this->hasMany('Aprogramming', 'course_id');
	}

	public function aquizes()
	{
		return $this->hasMany('Aquizes', 'course_id');
	}

	public function aexams()
	{
		return $this->hasMany('Aexams', 'course_id');
	}

	public function videos()
	{
		return $this->hasMany('Video', 'course_id');
	}

	public function readings()
	{
		return $this->hasMany('Areading', 'course_id');
	}
}