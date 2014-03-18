@section('content')

	
		<div> 
			{{{ $department->id }}} : {{{ $department->getName() }}} <br/>
			
			department courses: <br>
			@foreach($department->courses as $course)
				<div> 
					{{{ $course->code }}} : {{{ $course->name }}} 
					<a href="/course/{{{ $course->code }}}"> {{{ trans('default.View Course')}}} </a>
				</div>
			@endforeach
			<a href="/departments"> {{{ trans('default.back')}}} </a>
		</div>
	

@stop