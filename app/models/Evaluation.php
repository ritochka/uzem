<?php

class Evaluation extends Eloquent
{

	public function __construct()
	{
		$this->connection = 'depconnection';
		$this->table = 'dbp_olcmedegerlendirme';
	}

	public function course()
	{
		return $this->belongsTo('Course', 'dersgenelbilgi_id');

	}

}