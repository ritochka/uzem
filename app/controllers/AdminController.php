<?php

class AdminController extends BaseController
{
	public $layout;


	public function __construct()
	{
		$this->layout = 'layouts.simple';

		$this->beforeFilter('csrf', ['on' => ['post', 'put', 'delete']]);
	}


	public function Login()
	{
		$this->layout->title = 'Login';
		$this->layout->content = View::make('admin.login');
	}


	public function pLogin()
	{
		// $input = Input::all();
		$input = Input::only(['email', 'password']);

		$validator = Validator::make($input,
									['email' => 'required|email|max:100',
									'password'  => 'required|min:5|max:100']);
		
		if ($validator->fails())
			return Redirect::to('/login')->withErrors($validator)->withInput();

		if(Auth::attempt(['email' => $input['email'], 'password' => $input['password'], 'active' => 1]))
			return Redirect::to("/");

		
		return Redirect::to('/login')->withInput()->withMessage('email or password is incorrect');
	}


	public function pLogout()
	{ 
		Auth::logout();

		return Redirect::to("/");
	}
}