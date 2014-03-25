@section('content')

@foreach($faculties as $faculty)
<div> 
	<p style="font-weight:bold">{{{ $faculty->name }}}</p>
	@foreach($faculty->departments as $department) 
	<div style="margin-left:20px">
		<p style="font-weight:bold">{{{ $department->name }}}</p>
		@foreach($department->courses as $course) 
			<div style="margin-left:20px">
				<a href="/course/{{{ $course->code }}}"> 
					{{{ $course->code }}} : {{{ $course->name }}}
				</a>
			</div>
		@endforeach	
	</div>
	<hr>
	@endforeach
	<hr>
</div>
@endforeach

@stop