@section('content')

	
		<div> 
			{{{ $course->code }}} : {{{ $course->name }}} <br/>
			{{{trans('default.Offered by')}}}  {{{ $course->department->getName() }}}, faculty {{{ $course->department->faculty->getName() }}} <br/>
			{{{ $course->description }}} <br/>

			<a href="/courses"> {{{ trans('default.back')}}} </a>
		</div>
	

@stop