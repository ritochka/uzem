@section('content')

	@foreach($courses as $course)
		<div> 
			{{{ $course->code }}} : {{{ $course->name }}} 
			<a href="/course/{{{ $course->code }}}"> {{{ trans('default.View Course')}}} </a>
		</div>
	@endforeach

@stop