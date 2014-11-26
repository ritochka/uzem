<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DepartmentController extends BaseController
{

	public function __construct()
	{
		$this->layout = 'layouts.department';

		if(Menu::countChild(urldecode(Request::segment(2))) == 0)
			$this->layout = 'department.layouts.full';

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
				return Redirect::to('/department/' . Auth::user()->department->name . '/user/'. Auth::user()->kimlik . '/editpass');
		});
	
	}

	public function ListDeps()
	{
		$faculties = Faculty::orderBy('order')->get();

		$this->layout = View::make('department.layouts.nomenu');
		$this->layout->title = 'Departments';
		$this->layout->content = View::make('department.listdeps')->with('faculties', $faculties);
	}

	public function Home()
	{
		$infos = Info::where('type', '=', 1)->orderBy('id', 'desc')->take(7)->get();
			
		
		// $personels = Personel::all();
		// $ders = Ders::all();

		$this->layout = View::make('department.layouts.full');
		$this->layout->title = trans('default.Home');
		$this->layout->content = View::make('department.home')->with('infos', $infos);
	}

	public function ShortName($shortname)
	{
		$department = Department::where('shortname', '=', $shortname)->firstOrFail();
		return Redirect::action('DepartmentController@Home', [$department->name]);
	}

	public function Lang($lang)
	{
		if(!in_array($lang, ['tr', 'kg', 'ru', 'en'])) $lang = 'kg';
		return Redirect::action('DepartmentController@Home')->withCookie( Cookie::forever('lang', $lang) );
	}

	public function HomePic($depname)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		View::share('department', $department);

		if(Auth::user()->department_id == $department->personeldb_id)
		{
			$this->layout = View::make('department.layouts.full');
			$this->layout->title = trans('default.Home');
			$this->layout->content = View::make('department.homepic');
		}
		else
		{
			return Redirect::to('/department/' . $depname . '/home');
		}
	}

	public function PostHomePic($depname)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		if(Auth::user()->department_id == $department->personeldb_id)
		{
			$crop = Input::get('coords');
			$file = (Input::get('dataUrl') == "")? File::get(Input::get('srcUrl')): base64_decode(Input::get('dataUrl'));

			if ($crop != "" && $file != "")
			{
				$path = 'img/homepics';
				if(!File::isDirectory($path)) File::makeDirectory($path);

				$crop   = json_decode($crop, true);	

				$orig   = imagecreatefromstring($file);
				$big    = ImageCreateTrueColor($crop['w'], $crop['h']);

				$b_path = $path . '/' . $department->personeldb_id . '.jpg';
				imagecopyresampled($big, $orig, 0, 0, $crop['x'], $crop['y'], $crop['w'], $crop['h'], $crop['w'], $crop['h']);
				imagejpeg($big, $b_path, 80);

				imagedestroy($big); // release from memory

				return Redirect::to('department/' . $depname . '/home');
			}
		}
		
		return Redirect::to('/department/' . $depname . '/home');
		
	}

	public function Contacts($depname)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();
		View::share('department', $department);

		$this->layout = View::make('department.layouts.full');
		$this->layout->title = trans('default.Contacts');
		$this->layout->content = View::make('department.contacts');
	}
	
	public function Info($depname, $id)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();
		View::share('department', $department);

		$info = Info::find($id);

		$this->layout = View::make('department.layouts.full');
		$this->layout->title = $info->id;
		$this->layout->content = View::make('department.info')->with('info', $info);
	}

	public function Page($depname, $pagename)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		try
		{
			$page = Page::where('table', '=', 'department')->where('reference_id', '=', $department->id)->where('name', '=', $pagename)->firstOrFail();
		}
		catch(ModelNotFoundException $e)
		{
			$page = Page::where('table', '=', 'general')->where('name', '=', 'nopage')->firstOrFail();
			$page->name = $pagename;
		}

		View::share('department', $department);

		$this->layout->title = trans('default.Departments');
		$this->layout->content = View::make('department.page')->with('page', $page);
	}

	public function EditPage($depname, $pagename)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		if(Auth::check() && Auth::user()->department_id != $department->personeldb_id)
		{
			return Redirect::to('login');
		}

		View::share('department', $department);

		try
		{
			$page = Page::where('table', '=', 'department')->where('reference_id', '=', $department->id)->where('name', '=', $pagename)->firstOrFail();
			
			$this->layout->title = 'Edit '.$pagename.' page';
			$this->layout->content = View::make('department.editpage')->with('page', $page);
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::action('DepartmentController@NewPage', [$depname, $pagename]);
		}

	}

	public function UpdatePage($depname, $pagename)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		if(Auth::check() && Auth::user()->department_id != $department->personeldb_id)
		{
			return Redirect::to('login');
		}

		try
		{
			$page = Page::where('table', '=', 'department')->where('reference_id', '=', $department->id)->where('name', '=', $pagename)->firstOrFail();
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::action('Page', [$depname, $pagename]);
		}

		$input = Input::all();
		$validation = Validator::make($input, ['content' => 'required']);

		if ($validation->passes())
		{
			$page[App::getLocale()] = $input['content'];
			$page->save();
			
			return Redirect::to('department/'.$depname.'/page/'.$pagename);
		}

		return Redirect::to('department/'.$depname.'/page/'.$pagename.'/edit')->withInput()->withErrors($validation);

	}


	public function NewPage($depname, $pagename)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();
		
		if(Auth::check() && Auth::user()->department_id != $department->personeldb_id)
		{
			return Redirect::to('login');
		}

		View::share('department', $department);

		$this->layout->title = 'Create '.$pagename.' page';
		$this->layout->content = View::make('department.createpage')->with('pagename', $pagename);
	}

	public function CreatePage($depname, $pagename)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		if(Auth::check() && Auth::user()->department_id != $department->personeldb_id)
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
			
			return Redirect::to('department/'.$depname.'/page/'.$pagename);
		}

		return Redirect::to('department/'.$depname.'/page/'.$pagename.'/create')->withInput()->withErrors($validation);

	}

	public function AllNews($depname)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();
		View::share('department', $department);

		try
		{
			$infos = Info::where('department_id', '=', $department->id)->where('type', '=', 1)->orderBy('updated_at', 'DESC')->paginate(50);
		}
		catch(ModelNotFoundException $e)
		{
			Redirect::to('/department/'.$depname.'/home');
		}


		$this->layout = View::make('department.layouts.full');
		$this->layout->title = trans('default.Departments');
		$this->layout->content = View::make('department.news')->with('infos', $infos);
	}

	public function AllPubs($depname)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();
		View::share('department', $department);

		try
		{
			$pubs = Info::where('department_id', '=', $department->id)->where('type', '=', 2)->orderBy('updated_at', 'DESC')->paginate(50);
		}
		catch(ModelNotFoundException $e)
		{
			Redirect::to('/department/'.$depname.'/home');
		}


		$this->layout = View::make('department.layouts.full');
		$this->layout->title = trans('default.Departments');
		$this->layout->content = View::make('department.pubs')->with('pubs', $pubs);
	}

	public function News($depname, $id)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();
		View::share('department', $department);

		try
		{
			$info = Info::where('department_id', '=', $department->id)->where('id', '=', $id)->firstOrFail();
		}
		catch(ModelNotFoundException $e)
		{
			Redirect::to('/department/'.$depname.'/home');
		}

		$this->layout = View::make('department.layouts.full');
		$this->layout->title = trans('default.Departments');
		$this->layout->content = View::make('department.info')->with('info', $info);
	}

	public function EditNews($depname, $id)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();
		
		if(Auth::check() && Auth::user()->department_id != $department->personeldb_id)
		{
			return Redirect::to('login');
		}

		View::share('department', $department);

		try
		{
			$info = Info::where('id', '=', $id)->firstOrFail();
			// var_dump($info->title); die;

			$this->layout = View::make('department.layouts.full');
			$this->layout->title = 'Edit '.$info->id.' news';
			$this->layout->content = View::make('department.editnews')->with('info', $info);
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::action('DepartmentController@NewNews', [$depname, $id]);
		}

	}

	public function UpdateNews($depname, $id)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		if(Auth::check() && Auth::user()->department_id != $department->personeldb_id)
		{
			return Redirect::to('login');
		}

		try
		{
			$info = Info::where('department_id', '=', $department->id)->where('id', '=', $id)->firstOrFail();
		}
		
		catch (ModelNotFoundException $e)
		{
			return Redirect::action('News', [$depname, $id]);
		}

		$input = Input::all();
		$validation = Validator::make($input, ['title' => 'required', 'content' => 'required']);

		if ($validation->passes())
		{
			$info['title_'.App::getLocale()] = $input['title'];
			$info[App::getLocale()] = $input['content'];
			$info->type = $input['type'];
			$info->save();
			
			return Redirect::to('department/'.$depname.'/news/'.$id);
		}

		return Redirect::to('department/'.$depname.'/news/'.$id.'/edit')->withInput()->withErrors($validation);

	}

	public function DeleteNews($depname, $id)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		if(Auth::check() && Auth::user()->department_id != $department->personeldb_id)
		{
			return Redirect::to('login');
		}

		try
		{
			$info = Info::where('department_id', '=', $department->id)->where('id', '=', $id)->firstOrFail();
		}
		
		catch (ModelNotFoundException $e)
		{
			return Redirect::to('department/'.$depname.'/news/'. $id);
		}

		$type = $info->type;
		$info->delete();

		if($type == 1)
			return Redirect::to('department/'.$depname.'/news');
		else
			return Redirect::to('department/'.$depname.'/publications');

	}


	public function NewNews($depname)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();
		
		if(Auth::check() && Auth::user()->department_id != $department->personeldb_id)
		{
			return Redirect::to('login');
		}

		View::share('department', $department);

		$this->layout = View::make('department.layouts.full');
		$this->layout->title = 'Create news';
		$this->layout->content = View::make('department.createnews');
	}

	public function CreateNews($depname)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		if(Auth::check() && Auth::user()->department_id != $department->personeldb_id)
		{
			return Redirect::to('login');
		}
		
		$input = Input::all();
		$type = Input::get('type');
		$validation = Validator::make($input, ['title' => 'required', 'content' => 'required']);

		if ($validation->passes())
		{

			$info = new Info;

			$info->department_id = $department->id;
			$info['title_'.App::getLocale()] = $input['title'];
			$info[App::getLocale()] = $input['content'];
			$info->type = $input['type'];
			$info->save();
			
			return Redirect::to('department/'.$depname.'/home');
		}

		return Redirect::to('department/'.$depname.'/news/create')->withInput()->withErrors($validation);

	}

	public function Courses($depname, $level)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		View::share('department', $department);

		$levels = ['lisans', 'lisansustu', 'onlisans'];
		$currMonth = date('n') * 1;
				
		switch ($level) {
			case 'undergraduate':
				$level = $levels[0];
				break;
			case 'graduate':
				$level = $levels[1];
				break;
			case 'program':
				$level = $levels[2];
				break;
			default:
				$level = $department->dep_type == 3 ? $levels[2] : $levels[0];

				break;
		}

		try
		{
			if($currMonth<2 || $currMonth>8)
			{
				$courses = Course::where('bid', '=', $department->personeldb_id)->where('seviyesi', '=', $level)->whereIn('yariyil', [0, 1, 3, 5, 7])->get();
				$yariyil=1;
			}
			else
			{
				$courses = Course::where('bid', '=', $department->personeldb_id)->where('seviyesi', '=', $level)->whereIn('yariyil', [0, 2, 4, 6,8])->get();
				$yariyil=2;
			}			
		}

		catch(ModelNotFoundException $e)
		{
			$courses = null;
		}

		$this->layout->title = 'Courses';
		$this->layout->content = View::make('department.courses')->with('courses', $courses)->with('level', $level)->with('yariyil', $yariyil);
	}

	public function Course($depname, $code)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();
		$course = Course::where('code', '=', $code)->firstOrFail();
		$personnels = Rehber::where('SubType_Id', '=', $department->personeldb_id)->get();

		View::share('department', $department);

		$this->layout = View::make('department.layouts.full');
		$this->layout->title = $course->name;
		$this->layout->content = View::make('department.course')->with('course', $course);
	}

	public function Person($depname, $person)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		View::share('department', $department);

		if($person == 'all')
			$personnels = Rehber::where('SubType_Id', '=', $department->personeldb_id)->where('Hidden', '=', 0)->whereNotIn('Gorev_Id', [89, 90])->orderBy('Ireet')->get();
		elseif($person == 'instructor')
			$personnels = Rehber::where('SubType_Id', '=', $department->personeldb_id)->where('Hidden', '=', 0)->whereIn('Gorev_Id', [3, 11, 47, 48, 49])->orderBy('Ireet')->get();
		elseif($person == 'assistant')
			$personnels = Rehber::where('SubType_Id', '=', $department->personeldb_id)->where('Hidden', '=', 0)->whereIn('Gorev_Id', [4])->orderBy('Ireet')->get();
		elseif($person == 'staff')
			$personnels = Rehber::where('SubType_Id', '=', $department->personeldb_id)->where('Hidden', '=', 0)->whereIn('Gorev_Id', [13, 22, 23, 36, 56, 57, 58, 71, 83])->orderBy('Ireet')->get();
		else
			return Redirect::action('DepartmentController@Home', [$depname]);
		
		$this->layout->title = trans('default.People');
		$this->layout->content = View::make('department.people')->with('personnels', $personnels);
	}

	public function ListPics($depname)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		View::share('department', $department);

		if(Auth::user()->department_id == $department->personeldb_id)
		{
			$pics = File::files('img/pics/'.$department->personeldb_id);

			$this->layout = View::make('department.layouts.full');
			$this->layout->title = 'Pictures';
			$this->layout->content = View::make('department.listpics')->with('pics', $pics);
		}
		else
		{
			return Redirect::to('/department/' . $depname . '/home');
		}
	}

	public function Picture($depname, $picname)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		View::share('department', $department);

		if(Auth::user()->department_id == $department->personeldb_id)
		{
			if(File::isFile('img/pics/'.$department->personeldb_id.'/'.$picname))
				$pic = $picname;
			else
				return Redirect::action('DepartmentController@ListPics', [$depname]);

			$this->layout = View::make('department.layouts.full');
			$this->layout->title = 'Picture';
			$this->layout->content = View::make('department.picture')->with('pic', $pic);
		}
		else
		{
			return Redirect::to('/department/' . $depname . '/home');
		}
	}

	public function UpdatePicture($depname, $picname)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		View::share('department', $department);

		if(Auth::user()->department_id == $department->personeldb_id)
		{
			$crop = Input::get('coords');
			$dir = 'img/pics/'.$department->personeldb_id;
			$path = $dir.'/'.$picname;
			$file = File::get($path);
			$ext  = File::extension($path);

			if ($crop != "" && $file != "")
			{
				if(!File::isDirectory($dir)) File::makeDirectory($dir);

				$crop = json_decode($crop, true);

				$org = imagecreatefromstring($file);
				$src = ImageCreateTrueColor($crop['w'], $crop['h']);

				imagecopyresized($src, $org, 0, 0, $crop['x'], $crop['y'], $crop['w'], $crop['h'], $crop['w'], $crop['h']);
				imagejpeg($src, $path, 80);

				imagedestroy($src); // release from memory

				return Redirect::action('DepartmentController@ListPics', [$depname]);
			}
		}
		
		return Redirect::to('/department/' . $depname . '/home');
	}

	public function CreatePicture($depname)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		View::share('department', $department);

		if(Auth::user()->department_id == $department->personeldb_id)
		{
			$this->layout = View::make('department.layouts.full');
			$this->layout->title = 'Create picture';
			$this->layout->content = View::make('department.createpicture');
		}
		else
		{
			return Redirect::to('/department/' . $depname . '/home');
		}
	}

	public function StorePicture($depname)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		View::share('department', $department);

		if(Auth::user()->department_id == $department->personeldb_id)
		{
			$crop = Input::get('coords');
			$dir = 'img/pics/'.$department->personeldb_id;
			$path = $dir.'/'.$department->personeldb_id.'_'.uniqid().'.jpg';
			$file = base64_decode(Input::get('dataUrl'));

			if ($crop != "" && $file != "")
			{
				if(!File::isDirectory($dir)) File::makeDirectory($dir);

				$crop = json_decode($crop, true);
				$org = imagecreatefromstring($file);
				$src = ImageCreateTrueColor($crop['w'], $crop['h']);

				imagecopyresized($src, $org, 0, 0, $crop['x'], $crop['y'], $crop['w'], $crop['h'], $crop['w'], $crop['h']);
				imagejpeg($src, $path, 80);

				imagedestroy($src); // release from memory

				return Redirect::action('DepartmentController@ListPics', [$depname]);
			}
		}
		
		return Redirect::to('/department/' . $depname . '/home');
	}

	public function DeletePicture($depname, $picname)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		View::share('department', $department);

		if(File::delete('img/pics/'.$department->personeldb_id.'/'.$picname))
			return Redirect::action('DepartmentController@ListPics', [$depname]);

		return Redirect::action('DepartmentController@Picture', [$depname, $picname])->with('message', 'retry again');
	}

}