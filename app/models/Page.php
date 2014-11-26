<?php

class Page extends Eloquent
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
		$this->table = 'page';
		$this->timestamps = false;
	}

	public function department()
	{
		return $this->belongsTo('Department', 'reference_id');
	}

	public function getContent()
	{
		return $this[App::getLocale()];
	}

}