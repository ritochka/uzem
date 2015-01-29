<?php

class InstrCourse extends Eloquent
{
	public $table;

	public function __construct()
	{
		$this->connection = 'depconnection';
		$this->table = 'dbp_dersveren';
	}

	public function teachers()
	{
		return $this->belongsToMany('User', 'interest_areas_teachers', 'area_id', 'instr_id');
	}

}