<?php

class Unvan extends Eloquent
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

		$this->table = 'Unvan';
		$this->timestamps = false;
	}

	public function getUnvan()
	{
		return $this[App::getLocale()];
	}

}