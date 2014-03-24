<?php

class Aquizes extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table;

	public function __construct()
	{
		$this->table = 'aquizes';
	}

	public function course()
	{
		return $this->hasOne('Courses', 'course_id');
	}
	
}