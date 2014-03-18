@section('content')

	{{ Form::open(['action' => ['UserController@putEdit', $user->id], 'method' => 'put']) }}
		{{ Form::text('firstname', Input::old('firstname', $user->firstname), ['class' => 'form-control']) }}
		{{ Form::text('lastname', Input::old('lastname', $user->lastname), ['class' => 'form-control']) }}
		<button class="btn btn-default">update</button>
	{{ Form::close() }}

@stop