@section('content')

	
		<div> 
			{{{ $faculty->id }}} : {{{ $faculty->getName() }}} <br/>
			
			faculty departments: <br>
			@foreach($faculty->departments as $department)
				<div>
					<a href="/department/{{{ $department->name }}}">{{{ $department->getName() }}} </a>
				</div>
			@endforeach
			<a href="/faculties"> {{{ trans('default.back')}}} </a>
		</div>
	

@stop