<?php
namespace lib\repositories;

use Menu;
use Request;

class MenuRepository
{
	public function getMenus()
	{
		return Menu::where('parent_id', '=', 0)->orderBy('order')->get();
	}

	public function getChildMenus()
	{
		$name = urldecode(Request::segment(2));
		
		$menu = Menu::where('name', '=', $name)->firstOrFail();

		if($menu->parent_id == 0)
		{
			return $menu->getChilds($menu->id);
		}
		else
		{

			$menu = Menu::find($menu->parent_id);

			return $menu->getChilds($menu->id);
		}
	}

	public function getParentMenu()
	{
		$name = urldecode(Request::segment(2));
		
		$menu = Menu::where('name', '=', $name)->firstOrFail();


		if($menu->parent_id == 0)
		{
			return $menu->getParent($menu->id);
		}
		else
		{

			$menu = Menu::find($menu->parent_id);
		
			return $menu->getParent($menu->id);
		}
	}
}