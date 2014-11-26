<?php

class Department extends Eloquent
{
	// Don't forget to fill this array
	// protected $fillable   = [];

	// protected $guarded    = [];
	// protected $softDelete = true;

	// Add your validation rules here
	// public static $rules = [
		// 'title' => 'required'
	// ];
	
	public function __construct()
	{
		$this->connection = 'depconnection';
		$this->table = 'department';
		$this->timestamps = false;
	}

	public function faculty()
	{
		return $this->belongsTo('Faculty', 'faculty_id');
	}

	public function courses()
	{
		return $this->hasMany('Course', 'department_id', 'personeldb_id');
	}

	public function users()
	{
		return $this->hasMany('User', 'user_id');
	}

	public function getName()
	{
		return $this[App::getLocale()];
	}

	// public function getPage($page)
	// {
	// 	$page = $this->where('page_name', '=', $page)->first();
	// 	return $page['page_'.Config::get('app.locale')];
	// }

}