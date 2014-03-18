<?php

class Course extends Eloquent
{
	public $table;

	public function __construct()
	{
		$this->table = 'courses';
	}
}