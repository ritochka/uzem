<?php

class UserController extends BaseController
{
	public function __construct()
	{
		$this->layout = 'layouts.default';

		$this->beforeFilter('csrf', ['on' => ['post', 'put', 'delete']]);
	}

	public function User($id)
	{
		$user = User::find($id);

		// if(count($user) == 0)
		// 	return Redirect::to('/');

		$this->layout->title = 'User profile';
		$this->layout->content = View::make('user.user')->with('user', $user);
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