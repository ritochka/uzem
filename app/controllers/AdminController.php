<?php

class AdminController extends BaseController
{
	public $layout;


	public function __construct()
	{
		$this->layout = 'layouts.admin';

		$this->beforeFilter('csrf', ['on' => ['post', 'put', 'delete']]);
		$this->beforeFilter('auth', ['on' => 'post', 'except' => ['postLogin', 'postReminder', 'postLogout']]);

		$this->beforeFilter(function()
		{	
			if(!User::hasRoles(['admin']))
				return Redirect::to('login');
		}, ['except' => ['Login', 'postLogin', 'Reminder', 'postReminder', 'Reset', 'postLogout']]);
		
	}

	public function Index()
	{
		$faculties = Faculty::orderBy('order')->get();

		$this->layout->title = 'Departments';
		$this->layout->content = View::make('admin.index')->with('faculties', $faculties);
	}

	public function ResetPassword()
	{

		$this->layout->title = 'Reset password';
		$this->layout->content = View::make('admin.editpass');
	}

	public function Personnel()
	{
		$this->layout = View::make('admin.layouts.kendo');
		$this->layout->title = 'Personnel panel';
		$this->layout->content = View::make('admin.personnel');
	}

	public function postResetPassword()
	{
		$input = Input::only(['username']);
		$validation = Validator::make($input, ['username' => 'required|exists:user,kimlik']);

		if ($validation->passes())
		{
			User::where('kimlik', '=', $input['username'])->firstOrFail()->setAuthPassword($input['username']);

			
			return Redirect::to('/admin/password')->with('message', 'password has been successfully reset');
		}

		return Redirect::to('/admin/password')->withErrors($validation)->withInput();
	}

	public function EditEmail()
	{

		$this->layout->title = 'Reset password';
		$this->layout->content = View::make('admin.editemail');
	}

	public function postEditEmail()
	{
		$input = Input::only(['username', 'email']);
		$validation = Validator::make($input, ['username' => 'required|exists:user,kimlik', 'email' => 'required|email']);

		if ($validation->passes())
		{
			User::where('kimlik', '=', $input['username'])->firstOrFail()->setEmail($input['email']);
			
			return Redirect::to('/admin/email')->with('message', 'email has been successfully changed');
		}

		return Redirect::to('/admin/email')->withErrors($validation)->withInput();
	}

	public function Login()
	{
		$this->layout = View::make('layouts.simple');

		$this->layout->title = trans('default.Login');
		$this->layout->content = View::make('admin.login');
	}

	public function postLogin()
	{
		// $input = Input::all();
		$url = Input::get('redirectUrl', '/');

		$input = Input::only(['kimlik', 'password']);

		$validator = Validator::make($input,
									['kimlik'  => 'required',
									'password' => 'required']);

		if ($validator->fails())
			return Redirect::to('/login?redirectUrl='.$url)->withErrors($validator)->withInput();
		
		if(Auth::attempt(['kimlik' => $input['kimlik'], 'password' => $input['password'], 'active' => 1]))
			return Redirect::to($url);
		
		return Redirect::to('/login?redirectUrl='.$url)->withInput()->withMessage(trans('default.Kimlik or password is incorrect'));
	}

	public function postLogout()
	{ 
		$department = Auth::user()->department;
		Auth::logout();

		return Redirect::to(Input::get('redirectUrl', '/'));
	}

	public function Reminder()
	{
		$this->layout = View::make('layouts.simple');

		$this->layout->title = trans('default.Reminder');
		$this->layout->content = View::make('admin.reminder');
	}

	public function Reset($kimlik, $reminder_token)
	{
		$user = User::where('kimlik', '=', $kimlik)->firstOrFail();

		if($user->reminder_token == $reminder_token)
		{
			$user->reminder_token = '';
			$user->password = Hash::make($user->kimlik);
			$user->password_alt  = md5($user->kimlik);
			$user->save();

			if(Auth::attempt(['kimlik' => $user->kimlik, 'password' => $user->kimlik, 'active' => 1]))
				return Redirect::to('/department/'.$user->department->name.'/home');
		}

		return Redirect::to('/reminder')->withMessage('Error occcured, contact with IT Department');
	}

	public function postReminder()
	{
		// $input = Input::all();
		$url = Input::get('redirectUrl', '/');

		$input = Input::only(['kimlik', 'recaptcha_response_field']);

		$validator = Validator::make($input, [
									'kimlik'  => 'required|exists:user,kimlik,active,1',
									'recaptcha_response_field' => 'required|recaptcha',
									]);

		if ($validator->fails())
			return Redirect::to('/reminder?redirectUrl='.$url)->withErrors($validator)->withInput();
		
		$user = User::where('kimlik', '=', $input['kimlik'])->firstOrFail();

		if($user->email == '')
			return Redirect::to('/reminder?redirectUrl='.$url)->withMessage(trans('default.Email is not registered, contact IT Department'));

		$token = md5($user->kimlik.date("Ymd"));

		$user->reminder_token = $token;

		if($user->save())
		{
			Mail::queue('emails.auth.reminder', ['kimlik' => $user->kimlik, 'token' => $token], function($message) use ($user) {
				$message->to($user->email, $user->firstname.' '.$user->lastname)->subject('Password reminder');
			});
		}	
		// mail('nurchin@gmail.com', 'title', 'body');

		return Redirect::to('/reminder?redirectUrl='.$url)->withMessage(trans('default.Check your email'));
	}
}