<?php

class APIController extends BaseController
{
	public function __construct()
	{
		$this->beforeFilter('csrf', ['on' => ['post', 'put', 'delete']]);
		$this->beforeFilter('auth', ['on' => ['get', 'post']]);

		$this->beforeFilter(function()
		{	
			if(!User::hasRoles(['admin']))
				return Redirect::to('login');
		}, ['except' => ['']]);
		
	}

	// personnel json -----------------------------------------------------------------------------------------------------------
	public function CreatePersonnel()
	{	
		$input = Input::all();

		$dep  = Department::where('name', '=', $input['department'])->first();

		User::insert([
			'id'            => $input['kimlik'],
			'kimlik'        => $input['kimlik'],
			'firstname'     => $input['firstname'],
			'lastname'      => $input['lastname'],
			'gorev_id'      => $input['gorev_id'],
			'department_id' => $dep->personeldb_id,
			'email'         => $input['email'],
			'password'      => Hash::make($input['kimlik']),
			'password_alt'  => md5($input['kimlik']),
			]);

		$input['id'] = $input['kimlik'] * 1;

		try
		{
			DB::table('user_role')->insert(['user_id' => $input['id'], 'role_id' => $input['gorev_id']]);
		}
		catch(\Exception $e)
		{
			$role = DB::table('user_role')->where('user_id', '=', $input['id'])->update(['role_id' => $input['gorev_id']]);
		}

		return Response::json($input);
	}

	public function ReadPersonnel()
	{
		$take = Input::get('take', 10);
		$skip = Input::get('skip', 0);

		try
		{
			$filters = Input::get('filter')['filters'];
		}
		catch(\Exception $e)
		{
			$filters = null;
		}

		$total = DB::table('user')
		->join('department', 'user.department_id', '=', 'department.personeldb_id')
		->select('user.*', 'department.name as department')
		->where(function($query) use ($filters)
		{	
			if($filters && $filters != null)
			{
				foreach ($filters as $filter)
				{
					if($filter['field'] == 'department')
						$filter['field'] = 'name';

					if($filter['operator'] == 'eq')
					{
						if(is_array($filter['value']))
						{
							$values = [];
							foreach ($filter['value'] as $value)
							{
								array_push($values, $value['value']);
							}

							$query->whereIn($filter['field'], $values);
						}
						else
						{
							$query->where($filter['field'], '=', $filter['value']);
						}
					}
					elseif($filter['operator'] == 'startswith')
					{
						$query->where($filter['field'], 'LIKE', $filter['value'].'%');
					}
					elseif($filter['operator'] == 'contains')
					{
						$query->where($filter['field'], 'LIKE', '%'.$filter['value'].'%');
					}
				}

			}
		})->count();
		
		$users = DB::table('user')
		->join('department', 'user.department_id', '=', 'department.personeldb_id')
		->select('user.*', 'department.name as department')
		->where(function($query) use ($filters)
		{	
			if($filters && $filters != null)
			{
				foreach ($filters as $filter)
				{
					if($filter['field'] == 'department')
						$filter['field'] = 'name';
					
					if($filter['operator'] == 'eq')
					{
						if(is_array($filter['value']))
						{
							$values = [];
							foreach ($filter['value'] as $value)
							{
								array_push($values, $value['value']);
							}

							$query->whereIn($filter['field'], $values);
						}
						else
						{
							$query->where($filter['field'], '=', $filter['value']);
						}
					}
					elseif($filter['operator'] == 'startswith')
					{
						$query->where($filter['field'], 'LIKE', $filter['value'].'%');
					}
					elseif($filter['operator'] == 'contains')
					{
						$query->where($filter['field'], 'LIKE', '%'.$filter['value'].'%');
					}
				}

			}
		})
		->skip($skip)
		->take($take)
		->get();

		return Response::json(['data' => $users, 'total' => $total]);
	}

	public function UpdatePersonnel()
	{
		$input = Input::all();

		$user = User::find($input['id']);
		$dep  = Department::where('name', '=', $input['department'])->first();

		$user->kimlik    = $input['kimlik'];
		$user->gorev_id  = $input['gorev_id'];
		$user->email     = $input['email'];
		$user->firstname = $input['firstname'];
		$user->lastname  = $input['lastname'];
		$user->department_id = $dep->personeldb_id;
		$user->save();

		try
		{
			DB::table('user_role')->insert(['user_id' => $user->id, 'role_id' => $input['gorev_id']]);
		}
		catch(\Exception $e)
		{
			$role = DB::table('user_role')->where('user_id', '=', $user->id)->update(['role_id' => $input['gorev_id']]);
		}

		return Response::json($input);
	}

	public function DeletePersonnel()
	{	
		User::find(Input::get('id'))->delete();
		DB::table('user_role')->where('user_id', '=', Input::get('id'))->delete();

		return Response::json(Input::all());
	}
	// ------------------------------------------------------------------------------------------------------------------------

	// department json --------------------------------------------------------------------------------------------------------
	public function ReadDepartment()
	{
		try
		{
			$filters = Input::get('filter')['filters'];
		}
		catch(\Exception $e)
		{
			$filters = null;
		}
		
		$deps = Department::select('personeldb_id as department_id', 'name as department')
		->where(function($query) use ($filters)
		{	
			if($filters && $filters != null)
			{
				foreach ($filters as $filter)
				{
					if($filter['field'] == 'department')
						$filter['field'] = 'name';
				
					if($filter['operator'] == 'eq')
					{
						if(is_array($filter['value']))
						{
							$values = [];
							foreach ($filter['value'] as $value)
							{
								array_push($values, $value['value']);
							}

							$query->whereIn($filter['field'], $values);
						}
						else
						{
							$query->where($filter['field'], '=', $filter['value']);
						}
					}
					elseif($filter['operator'] == 'startswith')
					{
						$query->where($filter['field'], 'LIKE', $filter['value'].'%');
					}
					elseif($filter['operator'] == 'contains')
					{
						$query->where($filter['field'], 'LIKE', '%'.$filter['value'].'%');
					}
				}

			}
		})->get();

		return Response::json($deps);
	}
	// -------------------------------------------------------------------------------------------------------------------------
}