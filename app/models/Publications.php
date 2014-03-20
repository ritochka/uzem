<?php

class Publications extends Eloquent
{
	public $table;

	public function __construct()
	{
		$this->table = 'publications';
	}

	public function author()
	{
		return $this->hasOne('User', 'instr_id');
	}

	public function typename()
	{
		return $this->hasOne('PublicationsType', 'type', 'id');
	}

}