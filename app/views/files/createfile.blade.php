@section('content')

<div class="depcontent">
	@if(Session::has('message'))
	<ul class="alert alert-danger" style="list-style:none">
		{{{ Session::get('message') }}}
	</ul>
	@endif
	<p> {{{ trans('default.Maximum size for file is 600 Kb')}}} </p>
	{{ Form::open(['url' => '/file/create', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}
	<input type="file" name="file" accept="application/pdf,application/vnd.ms-excel,application/msword">
	<hr>
	<div>
		<a href="/file/list" class="btn btn-primary btn-sm">{{{ trans('default.back')}}}</a> | 
		<button type="submit" class="btn btn-primary btn-sm">{{{ trans('default.create')}}}</button>
	</div>
	{{ Form::close() }}
</div>

@stop