	@section('content')

	<div class="depcontent">
		<div class="panel-body">
			@foreach($courses as $course) 
				<div style="margin-left:20px">
					<a href="/course/courses/{{{ $course->code }}}"> 
						{{{ $course->code }}} : {{{ $course->name }}}
					</a>
				</div>
			@endforeach
		</div>
	</div>

	<div class="clearfix"></div>


	@stop