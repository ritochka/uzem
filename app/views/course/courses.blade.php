	@section('content')

	<div class="depcontent">
		<div class="panel-body">
			@foreach($courses as $course) 
				<div style="margin-left:20px">
					<a href="/course/courses/{{{ $course->derskod }}}"> 
						{{{ $course->derskod }}} : {{{ $course->getName() }}}
					</a>
				</div>
			@endforeach
		</div>
	</div>

	<div class="clearfix"></div>


	@stop