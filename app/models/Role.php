<?php

class Role extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table;

	public function __construct()
	{
		$this->table = 'roles';
	}

	public function users()
	{
		return $this->belongsToMany('User', 'user_roles');
	}
	
}