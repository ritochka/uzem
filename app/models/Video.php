<?php

class Video extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table;

	public function __construct()
	{
		$this->table = 'video';
	}

	public function course()
	{
		return $this->hasOne('Course', 'course_id');
	}
	
}