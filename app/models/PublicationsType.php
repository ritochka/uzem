<?php

class PublicationsType extends Eloquent
{
	public $table;

	public function __construct()
	{
		$this->table = 'publications_type';
	}


}