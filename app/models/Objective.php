<?php

class Objective extends Eloquent
{

	public function __construct()
	{
		$this->connection = 'depconnection';
		$this->table = 'dbp_dersogrcikti';
	}

	public function course()
	{
		return $this->belongsTo('Course', 'dersgenelbilgi_id');

	}

}