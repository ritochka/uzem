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
		$this->connection = 'depconnection';
		$this->table = 'user';
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
	
	public function courses()
	{
		//return $this->belongsToMany('Course', 'instr_course', 'instr_id', 'course_id');
		$c_ids = DB::table('instr_course')->where('course_id', '=', $this->id)->lists('instr_id');
		$ins = Rehber::whereIn('Kimlik', $ids)->get();
		// echo $ins; die;
		return $ins;
	}

	public function mycoursesnumber()
	{
		return count($this->courses);
	}
	
	public function teacher()
	{
		return $this->hasOne('Teacher', 'id');
	}

	public function roles()
	{
		return $this->belongsToMany('Role', 'user_roles', 'user_id', 'role_id');
		// $ids = DB::table('user_roles')->where('user_id', '=', $this->kimlik)->lists('role_id');
		// $rls = DB::table('role')->whereIn('id', $ids)->get()->toArray();
		// return $rls;
	}

	public function department()
	{
		return $this->belongsTo('Department', 'department_id', 'personeldb_id');
	}

	public static function hasRoles($roles)
	{
		if(Auth::check())
		{
			foreach ($roles as $role)
			{
				if(in_array($role, array_fetch(Auth::user()->roles->toArray(), 'name')))
					return true;
			}
		}
		
		return false;

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

	
	public function enroll()
	{
		

	}


	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	
	public function setAuthPassword($pass)
	{
		$this->password = Hash::make($pass);
		$this->password_alt = md5($pass);
		$this->save();
	}

	public function setEmail($email)
	{
		$this->email = $email;
		$this->save();
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

	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}
	public function getEducation()
	{
		if(trim($this['education_'.App::getLocale()]) != "")
			return $this['education_'.App::getLocale()];

		if(trim($this['education_tr']) != "")
			return $this['education_tr'];

		if(trim($this['education_kg']) != "")
			return $this['education_kg'];
	
		if(trim($this['education_ru']) != "")
			return $this['education_ru'];

		return $this['education_en'];
	
	}
	public function getPublication()
	{
		if(trim($this['publication_'.App::getLocale()]) != "")
			return $this['publication_'.App::getLocale()];

		if(trim($this['publication_tr']) != "")
			return $this['publication_tr'];

		if(trim($this['publication_kg']) != "")
			return $this['publication_kg'];
	
		if(trim($this['publication_ru']) != "")
			return $this['publication_ru'];

		return $this['publication_en'];
	}
	
}