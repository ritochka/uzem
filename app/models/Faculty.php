<?php

class Faculty extends Eloquent
{
	public $table;

	public function __construct()
	{
		$this->connection = 'depconnection';
		$this->table = 'faculty';
		$this->timestamps = false;
		
	}

	public function departments()
	{
		return $this->hasMany('Department', 'faculty_id');
	}

	public function getName()
	{
		return $this[Config::get('app.locale')];
	}

}