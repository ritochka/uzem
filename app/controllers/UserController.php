<?php

class UserController extends BaseController
{


	public function __construct()
	{
		$this->layout = 'layouts.default';

		$this->beforeFilter('csrf', ['on' => ['post', 'put', 'delete']]);
		$this->beforeFilter('auth', ['on' => 'post']);

		$this->beforeFilter(function()
		{	
			if(Auth::check() && Hash::check(Auth::user()->kimlik, Auth::user()->getAuthPassword()))
				return Redirect::to('/department/' . Auth::user()->department->name . '/user/'. Auth::user()->kimlik . '/editpass');
		}, ['except' => ['PasswordChange', 'PostPasswordChange']]);
		
	}

	/*public function User($kimlik)
	{
		$user = Rehber::where('kimlik', '=', $kimlik)->firstOrFail();

		$this->layout->title = $user->firstname . ' ' . $user->lastname;
		$this->layout->content = View::make('user.user')->with('user', $user);
	}*/

	public function Person($depname, $person)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		View::share('department', $department);
		View::share('faculty', $faculty);

		if($person == 'all')
			$personnels = Rehber::where('Hidden', '=', 0)->whereNotIn('Gorev_Id', [89, 90])->orderBy('Ireet')->get();
		elseif($person == 'instructor')
			$personnels = Rehber::where('Hidden', '=', 0)->whereIn('Gorev_Id', [3, 11, 47, 48, 49])->orderBy('Ireet')->get();
		elseif($person == 'assistant')
			$personnels = Rehber::where('Hidden', '=', 0)->whereIn('Gorev_Id', [4])->orderBy('Ireet')->get();
		elseif($person == 'staff')
			$personnels = Rehber::where('Hidden', '=', 0)->whereIn('Gorev_Id', [13, 22, 23, 36, 56, 57, 58, 71, 83])->orderBy('Ireet')->get();
		else
			return Redirect::action('DepartmentController@Home', [$depname]);
		
		$this->layout->title = trans('default.People');
		$this->layout->content = View::make('user.teachers')->with('personnels', $personnels)->with('faculty', $faculties);
	}

	public function PersonAll($person)
	{

		$faculties = Faculty::all();
		$departments = Department::all();

		if($person == 'all')
			$personnels = Rehber::where('SubType_Id', '=', 27)->where('Hidden', '=', 0)->whereNotIn('Gorev_Id', [89, 90])->orderBy('Ireet')->get();
		elseif($person == 'instructor')
			$personnels = Rehber::where('Hidden', '=', 0)->whereIn('Gorev_Id', [3, 11, 47, 48, 49])->orderBy('Ireet')->get();
		elseif($person == 'assistant')
			$personnels = Rehber::where('Hidden', '=', 0)->whereIn('Gorev_Id', [4])->orderBy('Ireet')->get();
		elseif($person == 'staff')
			$personnels = Rehber::where('Hidden', '=', 0)->whereIn('Gorev_Id', [13, 22, 23, 36, 56, 57, 58, 71, 83])->orderBy('Ireet')->get();
		else
			return Redirect::action('HomeController@Index');
		
		$this->layout->title = trans('default.People');
		$this->layout->content = View::make('user.teachers')->with('personnels', $personnels)->with('faculties', $faculties);
	}

	/*public function DepartmentUser($depname, $email)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		View::share('department', $department);

		$user = User::where('email', '=', $email)->firstOrFail();

		$this->layout = View::make('department.layouts.full');
		$this->layout->title = $user->firstname . ' ' . $user->lastname;
		$this->layout->content = View::make('user.user')->with('user', $user);
	}
	*/
	public function User($kimlik)
	{
		/*$department = Department::where('name', '=', $depname)->firstOrFail();
		
		View::share('department', $department);*/

		try
		{
			$user = Rehber::where('Kimlik', '=', $kimlik)->firstOrFail();
			$user2 = User::where('kimlik', '=', $kimlik)->firstOrFail();
		}
		catch (Exception $e)
		{
			return Redirect::to('/');
		}

		$this->layout = View::make('layouts.home');
		$this->layout->title = $user->Name . ' ' . $user->Surname;
		$this->layout->content = View::make('user.user')->with('user', $user)->with('user2', $user2)->with('courses', $user->courses());
	}

	public function EditUser($kimlik)
	{
		

		$user = User::where('kimlik', '=', $kimlik)->firstOrFail();

		if(Auth::check() && $user->kimlik == Auth::user()->kimlik)
		{
			$this->layout = View::make('layouts.home');
			$this->layout->title = $user->firstname . ' ' . $user->lastname;
			$this->layout->content = View::make('user.edit')->with('user', $user);
		}
		else
		{
			return Redirect::to('/department/' . $depname . '/home');
		}

	}

	public function UpdateUser($kimlik)
	{
		try
		{
			$user = User::where('kimlik', '=', $kimlik)->firstOrFail();
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::action('User', [$kimlik]);
		}

		if(Auth::check() && $user->kimlik == Auth::user()->kimlik)
		{

			$input = Input::all();
			$validation = Validator::make($input, ['education' => '', 'publication' => '']);

			if ($validation->passes())
			{
				//$user->education = $input['education'];
				$user['education_'.App::getLocale()] = $input['education'];
				$user['publication_'.App::getLocale()] = $input['publication'];
				//$user->publication = $input['publication'];
				$user->save();

				return Redirect::to('/user/'.$kimlik.'/profile');
			}

			return Redirect::to('/user/'.$kimlik.'/edit')->withInput()->withErrors($validation);
		}
		else
		{
			return Redirect::to('/');
		}

	}


	public function UserPicture($kimlik)
	{
		
		$user = User::where('kimlik', '=', $kimlik)->firstOrFail();

		$this->layout = View::make('layouts.home');
		$this->layout->title = $user->firstname . ' ' . $user->lastname;
		$this->layout->content = View::make('user.picture')->with('user', $user);
	}

	public function UpdateUserPicture($kimlik)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		View::share('department', $department);

		$user = User::where('kimlik', '=', $kimlik)->firstOrFail();

		$file  = Input::get('dataUrl');
		$crop  = Input::get('coords');

		if($file != "" && $crop != "")
		{
			$targ_w = 400;
			$targ_h = 400;
			$quality = 80;

			$crop  = json_decode($crop, true);
			$file  = base64_decode($file);
			$img_r = imagecreatefromstring($file);				
			$dst_r = ImageCreateTrueColor($targ_w, $targ_h);

			imagecopyresampled($dst_r, $img_r, 0, 0, $crop['x'], $crop['y'], $targ_w, $targ_h, $crop['w'], $crop['h']);

			$path = "img/profile/";
			$name = $user->id.".jpg";

			if(!File::isDirectory($path))
				File::makeDirectory($path);

			imagejpeg($dst_r, $path.$name, $quality);
			imagedestroy($dst_r); // release from memory
			
			return Redirect::action('UserController@DepartmentUser', [$depname, $kimlik]);
		}

		return Redirect::action('UserController@DepartmentUserPicture', [$depname, $kimlik])->withInput();
	}

	public function PasswordChange($depname)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		View::share('department', $department);

		$this->layout = View::make('department.layouts.full');
		$this->layout->title = trans('default.Home');
		$this->layout->content = View::make('user.editpass');
	}

	public function PostPasswordChange($depname)
	{
		$department = Department::where('name', '=', $depname)->firstOrFail();

		View::share('department', $department);

		$input = Input::all();
		$validation = Validator::make($input, ['new_password' => 'required|min:6|confirmed']);

		if ($validation->passes())
		{
			Auth::user()->setAuthPassword($input['new_password']);

			
			return Redirect::to('department/'.$depname.'/home');
		}

		return Redirect::to('/department/' . Auth::user()->department->name . '/user/'. Auth::user()->kimlik . '/editpass')->withErrors($validation);
	}

	public function Teachers()
	{
		$faculties = Faculty::all();

		$this->layout->title = 'Teachers';
		$this->layout->content = View::make('user.teachers')->with('faculties', $faculties);
	}

	public function Mycourses($id)
	{
		$user = User::find($id);

		
		$this->layout->title = 'My Courses';
		$this->layout->content = View::make('user.mycourses')->with('user', $user);
	}

	public function Edit($id)
	{
		$user = User::find($id);

		// if(count($user) == 0)
		// 	return Redirect::to('/');

		$this->layout->title = 'Edit user';
		$this->layout->content = View::make('user.edit')->with('user', $user);
	}

	public function putEdit($id)
	{
		return Redirect::to('user/'.$id);
	}

}