@section('content')

<div> 
	{{{ $course->code }}} : {{{ $course->name }}} <br/>

	<h1>
		{{{ trans('default.Agreement') }}}
	</h1>
	{{{$course->agreement_text}}}<br/>
	<a class="btn btn-primary" href="/inclass/{{{ $course->code}}}" >
		{{{ trans('default.I agree') }}}
	</a><br/> 

</div>

@endsection