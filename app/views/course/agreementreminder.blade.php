@section('content')

<div> 
	{{{ $course->code }}} : {{{ $course->name }}} <br/>

	<h1>
		{{{ trans('default.Agreement') }}}
	</h1>
	{{{$course->agreement_text}}}<br/>
	

</div>

@endsection


@section('sidebar')
@include('partials.course-sidebar')
@stop