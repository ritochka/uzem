@section('content')

<div> 
	{{{ $course->code }}} : {{{ $course->name }}} <br/>

	<h1>
		{{{ trans('default.Agreement') }}}
	</h1>
	{{{$course->agreement_text}}}<br/>
	{{ Form::open(['url' => '/agreement/courses/'.$course->code]) }}
	<button type="submit" class="btn btn-primary">
		{{{ trans('default.I agree') }}}
	</button>
	{{ Form::close() }}

</div>

@endsection