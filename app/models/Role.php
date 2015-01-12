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
		$this->table = 'role';
	}

	public function users()
	{
		//return $this->belongsToMany('User', 'user_role', 'role_id', 'user_id');
		$ids = DB::table('user_roles')->where('role_id', '=', $this->id)->lists('user_id');
		$ins = Rehber::whereIn('Kimlik', $ids)->get();
		return $ins;
	}

	public function getName()
	{
		return $this[App::getLocale()];
	}

	
	
}