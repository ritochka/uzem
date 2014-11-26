<?php

class DersBilgi extends Eloquent
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
		$this->table = 'dbp_mainders';
		$this->timestamps = false;
	}

	public function course()
	{
		return $this->belongsTo('Course', 'mainders_id');
	}

}