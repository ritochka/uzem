<?php

class Syllabus extends Eloquent
{

	public function __construct()
	{
		$this->connection = 'depconnection';
		$this->table = 'dbp_dersgenelbilgi';
	}

	public function course()
	{
		return $this->belongsTo('Course', 'mainders_id');

	}

}