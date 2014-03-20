<?php

class StaffEducation extends Eloquent
{
	public $table;

	public function __construct()
	{
		$this->table = 'staff_education';
	}

	public function edtype()
	{
		return $this->hasOne('Degrees', 'id', 'level');
	}

	public function studied()
	{
		return $this->hasOne('Affiliation', 'id', 'institution_id');
	}

	
}