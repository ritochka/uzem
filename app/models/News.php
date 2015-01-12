<?php

class News extends Eloquent
{
	public $table;

	public function __construct()
	{
		$this->table = 'news';
	}

	public function getTitle()
	{

		$title = $this['title_'.Config::get('app.locale')];

		if($title == '')
			$title = $this->title_kg;
		if($title == '')
			$title = $this->title_tr;
		if($title == '')
			$title = $this->title_en;
		if($title == '')
			$title = $this->title_ru;
		
		if($title == '')
			return 'no title';

		return $title;
	}

	public function getContent()
	{
		$content = $this[Config::get('app.locale')];

		if($content == '')
			$content = $this->kg;
		if($content == '')
			$content = $this->tr;
		if($content == '')
			$content = $this->en;
		if($content == '')
			$content = $this->ru;
		
		if($content == '')
			return 'no content';

		return $content;
	}

	public function getTime()
	{
		return BaseModel::localDate($this->updated_at);
	}

	public function getDescription()
	{
		return $this['description_'.Config::get('app.locale')];
	}
}