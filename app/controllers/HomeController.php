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
		 $courses = Course::where('online', '=', 1)->get();
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


	public function EditPage($pagename)
	{
	

		if(!Auth::check())
		{
			return Redirect::to('login');
		}

		try
		{
			$page = Page::where('table', '=', 'department')->where('name', '=', $pagename)->firstOrFail();
			
			$this->layout->title = 'Edit '.$pagename.' page';
			$this->layout->content = View::make('page.editpage')->with('page', $page);
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::action('HomeController@NewPage', [$pagename]);
		}

	}

	public function UpdatePage($pagename)
	{
		if(!Auth::check())
		{
			return Redirect::to('login');
		}

		try
		{
			$page = Page::where('table', '=', 'department')->where('name', '=', $pagename)->firstOrFail();
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::action('Page', [$pagename]);
		}

		$input = Input::all();
		$validation = Validator::make($input, ['content' => 'required']);

		if ($validation->passes())
		{
			$page[App::getLocale()] = $input['content'];
			$page->save();
			
			return Redirect::to('page/'.$pagename);
		}

		return Redirect::to('page/'.$pagename.'/edit')->withInput()->withErrors($validation);

	}


	public function NewPage($pagename)
	{
		if(!Auth::check())
		{
			return Redirect::to('login');
		}

		$this->layout->title = 'Create '.$pagename.' page';
		$this->layout->content = View::make('page.createpage')->with('pagename', $pagename);
	}

	public function CreatePage($pagename)
	{
		if(!Auth::check())
		{
			return Redirect::to('login');
		}

		$input = Input::all();
		$validation = Validator::make($input, ['content' => 'required']);

		if ($validation->passes())
		{
			$page = new Page;

			$page->reference_id = $department->id;
			$page->table = 'department';
			$page->name = $pagename;
			$page[App::getLocale()] = $input['content'];
			$page->save();
			
			return Redirect::to('page/'.$pagename);
		}

		return Redirect::to('page/'.$pagename.'/create')->withInput()->withErrors($validation);

	}

	public function ListDeps()
	{
		$faculties = Faculty::where('active', '=', 1)->orderBy('order')->get();

		$this->layout = View::make('layouts.default');
		$this->layout->title = 'Departments';
		$this->layout->content = View::make('department.listdeps')->with('faculties', $faculties);
	}


}