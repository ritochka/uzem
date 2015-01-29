<?php

class Kaynak extends Eloquent
{

	public function __construct()
	{
		$this->connection = 'depconnection';
		$this->table = 'dbp_kaynak';
	}

	public function course()
	{
		return $this->belongsTo('Course', 'dersgenelbilgi_id');

	}

}