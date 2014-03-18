@section('content')

	@foreach($departments as $department)
		<div> 
			{{{ $department->id }}} : {{{ $department->getName() }}} 
			<a href="/department/{{{ $department->name }}}"> {{{ trans('default.View department') }}} </a>
		</div>
	@endforeach

@stop