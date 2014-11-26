<?php

class Menu extends Eloquent
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
		$this->table = 'menu';
		$this->timestamps = false;
	}

	public function page()
	{
		return $this->belongsTo('Page', 'page_id');
	}

	public function showMenu($dep_type)
	{
		if (strpos($this->dep_types, $dep_type) === false)
			return false;
			
		return true;

	}

	public function getName()
	{
		return $this[App::getLocale()];
	}

	public function getChilds($id)
	{
		return $this->where('parent_id', '=', $id)->orderBy('order')->get();
	}

	public function getParent()
	{
		return Menu::find($this->parent_id);
	}

	public function isActive($name)
	{
		try
		{
			$menu = Menu::where('name', '=', $name)->firstOrFail();
		}
		catch(\Exception $e)
		{
			$menu = null;
		}

		if($menu == null)
			return false;

		if(($menu->parent_id == 0 && $menu->name == $this->name) || $menu->parent_id == $this->id)
			return true;
		
		return false;
		
	}

	public static function countChild($name)
	{
		try
		{
			$menu = Menu::where('name', '=', $name)->firstOrFail();
		}
		catch(\Exception $e)
		{
			$menu = null;
		}

		if($menu != null && $menu->parent_id == 0)
			return count($menu->getChilds($menu->id));

		return 1;
	}

	public function getUrls()
	{
		return $this->section.'/'. $this->page->department->name .'/'. $this->type .'/'.$this->name;
	}

}