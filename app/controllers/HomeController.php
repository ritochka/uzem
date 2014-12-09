<?php

class HomeController extends BaseController
{

	public function __construct()
	{
		$this->layout = 'layouts.default';

		if(Menu::countChild(urldecode(Request::segment(2))) == 0)
			$this->layout = 'layouts.home';
		

		$this->beforeFilter('csrf', ['on' => ['post', 'put', 'delete']]);
		$this->beforeFilter('auth', ['on' => 'post']);
		// $this->beforeFilter('auth', ['on' => 'post', 'except' => ['pLogin', 'pRegister']]);

		$this->beforeFilter(function()
		{	
			if(!User::hasRoles(['admin', 'secretary']))
				return Redirect::guest('login');
		}, ['only' => ['HomePic', 'PostHomePic', 'EditPage', 'UpdatePage', 'EditNews', 'UpdateNews', 'NewNews', 'CreateNews', 'ListPics', 'CreatePicture', 'StorePicture', 'Picture', 'UpdatePicture', 'DeletePicture']]);

		$this->beforeFilter(function()
		{	
			if(Auth::check() && Hash::check(Auth::user()->kimlik, Auth::user()->getAuthPassword() ) )
				return Redirect::to('/user/'. Auth::user()->kimlik . '/editpass');
		});
	}

	public function Index()
	{
		 $courses = Course::all();
		 $news = News::all();
		 
		 $this->layout = View::make('layouts.home');
		 $this->layout->title = 'Home';
		 $this->layout->content = View::make('home.index', compact('courses', 'news'));
	}

	public function Page($pagename)
	{	
		//$this->layout = 'layouts.default';
		
		try
		{
			$page = Page::where('table', '=', 'department')->where('name', '=', $pagename)->firstOrFail();
		}
		catch(ModelNotFoundException $e)
		{
			$page = Page::where('table', '=', 'general')->where('name', '=', 'nopage')->firstOrFail();
			$page->name = $pagename;
		}

	
		$this->layout->title = $pagename;
		$this->layout->content = View::make('home.page')->with('page', $page);
	}


}