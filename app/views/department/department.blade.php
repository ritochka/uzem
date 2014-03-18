@section('content')

	
		<div> 
			{{{ $department->id }}} : {{{ $department->name }}} <br/>
			
			department courses: <br>
			@foreach($department->courses as $course)
				<div> 
					{{{ $course->code }}} : {{{ $course->name }}} 
					<a href="/course/{{{ $course->id }}}"> {{{ trans('default.View Course')}}} </a>
				</div>
			@endforeach
			<a href="/departments"> {{{ trans('default.back')}}} </a>
		</div>
	

@stop