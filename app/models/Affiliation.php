<?php

class Affiliation extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table;

	public function __construct()
	{
		$this->table = 'affiliations';
	}

	public function teachers_from()
	{
		return $this->hasMany('Teacher', 'affiliation_id');
	}
	
}