<?php

class Aexams extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table;

	public function __construct()
	{
		$this->table = 'aexams';
	}

	public function course()
	{
		return $this->hasOne('Courses', 'course_id');
	}
	
}