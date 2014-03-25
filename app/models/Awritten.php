<?php

class Awritten extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table;

	public function __construct()
	{
		$this->table = 'awritten';
	}

	public function course()
	{
		return $this->hasOne('Course', 'course_id');
	}
	
}