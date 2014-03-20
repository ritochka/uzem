<?php

class Degrees extends Eloquent
{
	public $table;

	public function __construct()
	{
		$this->table = 'degrees';
	}

	
}