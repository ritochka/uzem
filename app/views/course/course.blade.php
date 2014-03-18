@section('content')

	
		<div> 
			{{{ $course->code }}} : {{{ $course->name }}} <br/>
			{{{trans('default.Offered by')}}}  {{{ $course->department->name }}}, faculty {{{ $course->department->faculty->name }}} <br/>
			{{{ $course->description }}} <br/>

			<a href="/courses"> {{{ trans('default.back')}}} </a>
		</div>
	

@stop