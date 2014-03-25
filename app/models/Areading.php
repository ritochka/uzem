<?php

class Areading extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table;

	public function __construct()
	{
		$this->table = 'reading';
	}

	public function course()
	{
		return $this->hasOne('Course', 'course_id');
	}
	
}