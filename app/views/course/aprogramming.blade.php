@section('content')

<div> 
	{{{ $course->code }}} : {{{ $course->name }}} <br/>

	<h1>
		{{{ trans('default.Programming Assignments') }}}
	</h1>
	@foreach ($course->aprogrammings as $aprogramming)
		{{{ trans('default.Week')}}}: {{{ $aprogramming->week }}} <br/>
		<a href="/inclass/{{{ $course->code }}}/aprogramming/{{{$aprogramming->url}}}" >
			{{{ $aprogramming->title }}} 
		</a><br/> 
		{{{ trans('default.Description')}}}: {{{ $aprogramming->assignment }}} <br/>
							
	@endforeach
	

</div>

@endsection


@section('sidebar')
@include('partials.course-sidebar')
@stop