<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table;

	public function __construct()
	{
		$this->table = 'users';
	}

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function courses()
	{
		return $this->belongsToMany('Course', 'instr_course', 'instr_id', 'course_id');
	}
	
	public function teacher()
	{
		return $this->hasOne('Teacher', 'id');
	}

	public function roles()
	{
		return $this->belongsToMany('Role', 'user_roles');
	}

	public function interestareas()
	{
		return $this->belongsToMany('InterestAreas', 'interest_areas_teachers', 'instr_id', 'area_id');
	}

	public function publications()
	{
		return $this->hasMany('Publications', 'instr_id');
	}

	public function educations()
	{
		return $this->hasMany('StaffEducation', 'user_id');
	}

	public function hasRoles($roles)
	{
		if(Auth::check())
		foreach ($roles as $role)
		{
			if(in_array($role, array_fetch($this->roles->toArray(), 'name')))
				return 1;
		}

		return 0;
	}

	public function enroll()
	{
		

	}
	
}