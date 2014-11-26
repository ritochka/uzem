<?php

class Gorev extends Eloquent
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

		$this->table = 'Gorev';
		$this->timestamps = false;
	}

	public function getGorev()
	{
		if(trim($this['Gorev_'.App::getLocale()]) != "")
			return $this['Gorev_'.App::getLocale()];

		return $this->Gorev;
	}

}