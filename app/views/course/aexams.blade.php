@section('content')

<div> 
	{{{ $course->code }}} : {{{ $course->name }}} <br/>

	<h1>
		{{{ trans('default.Exams') }}}
	</h1>
	@foreach ($course->aexams as $aexam)
		{{{ trans('default.Week')}}}: {{{ $aexam->week }}} <br/>
		<a href="/inclass/{{{ $course->code }}}/aexam/{{{$aexam->url}}}" >
			{{{ $aexam->title }}} 
		</a><br/> 
		{{{ trans('default.Description')}}}: {{{ $aexam->assignment }}} <br/>
							
	@endforeach
	

</div>

@endsection