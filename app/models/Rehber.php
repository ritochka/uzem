<?php

class Rehber extends Eloquent
{
	// Don't forget to fill this array
	// protected $fillable   = [];

	// protected $guarded    = [];
	// protected $softDelete = true;

	// Add your validation rules here
	// public static $rules = [
		// 'title' => 'required'
	// ];
	
	public function __construct()
	{
		$this->connection = 'erehber';
		$this->table = 'Personel';
		$this->timestamps = false;
	}

	public function unvan()
	{
		return $this->belongsTo('Unvan', 'Unvan_Id');
	}

	public function gorev()
	{
		return $this->belongsTo('Gorev', 'Gorev_Id');
	}

	public function building()
	{
		return $this->belongsTo('Bina', 'Bina_Id');
	}

	public function getDepTeachers()
	{
		return $this->where('Gorev_Id', '=', 4)->get();
	}

	public function getFullname()
	{
		return $this->unvan->getUnvan() . ' ' . $this->getName() . ' ' . $this->getSurname();
	}
	
	public function getName()
	{
		if(trim($this['Name_'.App::getLocale()]) != "")
			return $this['Name_'.App::getLocale()];

		return $this->Name;
	}

	public function getSurname()
	{
		if(trim($this['Surname_'.App::getLocale()]) != "")
			return $this['Surname_'.App::getLocale()];

		return $this->Surname;
	}

	public function courses()
	{
		try
		{
			$db = DB::table('dbp_dersveren')->where('personel_id', '=', $this->Kimlik)->lists('dersgenelbilgi_id');			
			$courses = Course::whereIn('id', $db)->get();
			return $courses;
			
		}
		catch (Exception $e)
		{
			return null;	
		}
		
	}

	/*public function courses()
	{
		return $this->belongsToMany('Course', 'instr_course', 'instr_id', 'course_id');
	}*/

}