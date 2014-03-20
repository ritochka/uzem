<?php

class InterestAreas extends Eloquent
{
	public $table;

	public function __construct()
	{
		$this->table = 'interest_areas';
	}

	public function teachers()
	{
		return $this->belongsToMany('User', 'interest_areas_teachers', 'area_id', 'instr_id');
	}

}