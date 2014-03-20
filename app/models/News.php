<?php

class News extends Eloquent
{
	public $table;

	public function __construct()
	{
		$this->table = 'news';
	}
}