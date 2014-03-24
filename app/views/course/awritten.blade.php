@section('content')

<div> 
	{{{ $course->code }}} : {{{ $course->name }}} <br/>

	<h1>
		{{{ trans('default.Written Assignments') }}}
	</h1>
	@foreach ($course->awrittens as $awritten)
		{{{ trans('default.Week')}}}: {{{ $awritten->week }}} <br/>
		<a href="/inclass/{{{ $course->code }}}/awritten/{{{$awritten->url}}}" >
			{{{ $awritten->title }}} 
		</a><br/> 
		{{{ trans('default.Description')}}}: {{{ $awritten->assignment }}} <br/>
							
	@endforeach
	

</div>

@endsection