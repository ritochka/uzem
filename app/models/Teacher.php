<?php

class Teacher extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table;

	public function __construct()
	{
		$this->table = 'teachers';
	}

	public function user()
	{
		return $this->hasOne('User', 'id');
	}

	public function affiliation()
	{
		return $this->belongsTo('Affiliation', 'affiliation_id');
	}

	
}