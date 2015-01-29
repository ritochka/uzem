<?php

class Weekly extends Eloquent
{

	public function __construct()
	{
		$this->connection = 'depconnection';
		$this->table = 'dbp_haftalikdersicerigi';
	}

	public function course()
	{
		return $this->belongsTo('Course', 'dersgenelbilgi_id');

	}

}