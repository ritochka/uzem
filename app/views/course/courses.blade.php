@section('content')

	@foreach($courses as $course)
		<div> {{{ $course->code }}} : {{{ $course->name }}} </div>
	@endforeach

@stop