@section('content')

<div class='depcontent' style="background: white">
	@if(Session::has('message'))
	<ul class="alert alert-danger" style="list-style:none">
		{{{ Session::get('message') }}}
	</ul>
	@endif
	@include('partials.errors')

	{{ Form::open(['url' => '/admin/email', 'class' => 'form-horizontal', 'role' => 'form']) }}

	<div class="form-group">
		<div class="col-sm-4">
			<h4>Username:</h4>
			{{ Form::text('username', Input::old('username'), ['class' => 'form-control', 'required' => true]) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
			<h4>Email:</h4>
			{{ Form::text('email', Input::old('email'), ['class' => 'form-control', 'required' => true]) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" class="btn btn-danger btn-sm">set email</button>
		</div>
	</div>    
	{{ Form::close() }}
</div>

@stop