<?php

class HomeController extends BaseController
{

	public function __construct()
	{
		$this->layout = 'layouts.home';

		$this->beforeFilter('csrf', ['on' => ['post', 'put', 'delete']]);
	}

	public function Index()
	{
		$courses = Course::all();
		$news    = News::all();
		
		$this->layout->title = 'Home';
		$this->layout->content = View::make('home.index', compact('courses', 'news'));
	}
}