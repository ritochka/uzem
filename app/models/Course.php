<?php

class Course extends Eloquent
{

	public function __construct()
	{
		$this->connection= 'depconnection';
		$this->table = 'dbp_mainders';
	}

	public function department()
	{
		return $this->belongsTo('Department', 'bid');
	}

	public function getName()
	{
		if(trim($this['dersad_'.App::getLocale()]) != "")
			return $this['dersad_'.App::getLocale()];

		return $this->Name;
	}

	public function instructors()
	{
		$ids = InstrCourse::where('dersgenelbilgi_id', '=', $this->id)->lists('personel_id');
		$ins = Rehber::whereIn('Kimlik', $ids)->get();
		return $ins;

	}

	public function literatures()
	{
		return $this->hasMany('Kaynak', 'dersgenelbilgi_id');
	}

	public function objectives()
	{
		return $this->hasMany('Objective', 'dersgenelbilgi_id');
	}

	public function weekly()
	{
		return $this->hasMany('Weekly', 'dersgenelbilgi_id');
	}

	public function evaluation()
	{
		return $this->hasMany('Evaluation', 'dersgenelbilgi_id');
	}

	public function syllabus()
	{
		return $this->hasOne('Syllabus', 'mainders_id');

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