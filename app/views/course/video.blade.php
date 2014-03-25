@section('content')

<div> 
	{{{ $course->code }}} : {{{ $course->name }}} <br/>

	<h1>
		{{{ trans('default.Video') }}}
	</h1>
	@foreach ($course->videos as $video)
		{{{ trans('default.Week')}}}: {{{ $video->week }}} <br/>
		<a href="/inclass/{{{ $course->code }}}/videoes/{{{$video->url}}}" >
			{{{ $video->title }}} 
		</a><br/> 
		{{{ trans('default.Description')}}}: {{{ $video->assignment }}} <br/>
							
	@endforeach
	

</div>

@endsection

@section('sidebar')
@include('partials.course-sidebar')
@stop