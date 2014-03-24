@section('content')

<div> 
	{{{ $course->code }}} : {{{ $course->name }}} <br/>

	<h1>
		{{{ trans('default.Quizes') }}}
	</h1>
	@foreach ($course->aquizes as $aquiz)
		{{{ trans('default.Week')}}}: {{{ $aquiz->week }}} <br/>
		<a href="/inclass/{{{ $course->code }}}/aquizes/{{{$aquiz->url}}}" >
			{{{ $aquiz->title }}} 
		</a><br/> 
		{{{ trans('default.Description')}}}: {{{ $aquiz->assignment }}} <br/>
							
	@endforeach
	

</div>

@endsection