@section('content')

<div> 
	{{{ $course->code }}} : {{{ $course->name }}} <br/>

	<h1>
		{{{ trans('default.Reading') }}}
	</h1>
	@foreach ($course->readings as $reading)
		{{{ trans('default.Week')}}}: {{{ $reading->week }}} <br/>
		<a href="/inclass/{{{ $course->code }}}/reading/{{{$reading->url}}}" >
			{{{ $reading->title }}} 
		</a><br/> 
		{{{ trans('default.Description')}}}: {{{ $reading->assignment }}} <br/>
							
	@endforeach
	

</div>

@endsection


@section('sidebar')
@include('partials.course-sidebar')
@stop