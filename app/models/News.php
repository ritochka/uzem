<?php

class News extends Eloquent
{
	public $table;

	public function __construct()
	{
		$this->table = 'news';
	}

	public function getName()
	{
		return $this->title;
	}

	public function getDescription()
	{
		return $this->description;
	}
}