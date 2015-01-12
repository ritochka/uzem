<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NewsController extends BaseController
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

	
	public function Info($id)
	{
		
		$info = Info::find($id);

		$this->layout = View::make('layouts.home');
		$this->layout->title = $info->id;
		$this->layout->content = View::make('news.info')->with('info', $info);
	}

	
	public function AllNews()
	{
		
		try
		{
			$infos = Info::where('type', '=', 1)->orderBy('updated_at', 'DESC')->paginate(50);
		}
		catch(ModelNotFoundException $e)
		{
			Redirect::to('/home');
		}


		$this->layout = View::make('layouts.home');
		$this->layout->title = trans('default.uzem');
		$this->layout->content = View::make('news.news')->with('infos', $infos);
	}

	
	public function News($id)
	{
	
		try
		{
			$info = Info::where('id', '=', $id)->firstOrFail();
		}
		catch(ModelNotFoundException $e)
		{
			Redirect::to('/home');
		}

		$this->layout = View::make('layouts.home');
		$this->layout->title = trans('default.Departments');
		$this->layout->content = View::make('news.info')->with('info', $info);
	}

	public function EditNews($id)
	{
				
		if(!Auth::check())
		{
			return Redirect::to('login');
		}

		try
		{
			$info = Info::where('id', '=', $id)->firstOrFail();
			// var_dump($info->title); die;

			$this->layout = View::make('layouts.home');
			$this->layout->title = 'Edit '.$info->id.' news';
			$this->layout->content = View::make('news.editnews')->with('info', $info);
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::action('NewsController@NewNews', [$id]);
		}

	}

	public function UpdateNews($id)
	{
		

		if(!Auth::check())
		{
			return Redirect::to('login');
		}

		try
		{
			$info = Info::where('id', '=', $id)->firstOrFail();
		}
		
		catch (ModelNotFoundException $e)
		{
			return Redirect::action('News', [$id]);
		}

		$input = Input::all();
		$validation = Validator::make($input, ['title' => 'required', 'content' => 'required']);

		if ($validation->passes())
		{
			$info['title_'.App::getLocale()] = $input['title'];
			$info[App::getLocale()] = $input['content'];
			//$info->type = $input['type'];
			$info->save();
			
			return Redirect::to('/news/'.$id);
		}

		return Redirect::to('/news/'.$id.'/edit')->withInput()->withErrors($validation);

	}

	public function DeleteNews($id)
	{
		

		if(!Auth::check())
		{
			return Redirect::to('login');
		}

		try
		{
			$info = Info::where('id', '=', $id)->firstOrFail();
		}
		
		catch (ModelNotFoundException $e)
		{
			return Redirect::to('/news/'. $id);
		}

		$type = $info->type;
		$info->delete();

		if($type == 1)
			return Redirect::to('/news');
		else
			return Redirect::to('/publications');

	}


	public function NewNews()
	{
		
		
		if(!Auth::check())
		{
			return Redirect::to('login');
		}

	

		$this->layout = View::make('layouts.home');
		$this->layout->title = 'Create news';
		$this->layout->content = View::make('news.createnews');
	}

	public function CreateNews()
	{
	

		if(!Auth::check())
		{
			return Redirect::to('login');
		}
		
		$input = Input::all();
		$type = Input::get('type');
		$validation = Validator::make($input, ['title' => 'required', 'content' => 'required']);

		if ($validation->passes())
		{

			$info = new Info;

		
			$info['title_'.App::getLocale()] = $input['title'];
			$info[App::getLocale()] = $input['content'];
			//$info->type = $input['type'];
			$info->save();
			
			return Redirect::to('/');
		}

		return Redirect::to('/news/create')->withInput()->withErrors($validation);

	}

}