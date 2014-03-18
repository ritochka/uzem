@section('content')

	@foreach($faculties as $faculty)
		<div> 
			{{{ $faculty->id }}} : {{{ $faculty->getName() }}} 
			<a href="/faculty/{{{ $faculty->name }}}"> {{{ trans('default.View faculty') }}} </a>
		</div>
	@endforeach

@stop