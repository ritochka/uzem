<?php
namespace lib\composers;

use lib\repositories\MenuRepository;

class MenuComposer
{
	protected $menu;

	public function __construct(MenuRepository $menu)
	{
		$this->menu = $menu;
	}

	public function compose($view)
	{
		$view->with('menus', $this->menu->getMenus());
	}
}