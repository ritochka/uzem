@section('content')

	
		<div> 
			{{{ $faculty->id }}} : {{{ $faculty->name }}} <br/>
			
			faculty departments: <br>
			@foreach($faculty->departments as $department)
				<div>
					<a href="/department/{{{ $department->name }}}">{{{ $department->name }}} </a>
				</div>
			@endforeach
			<a href="/faculties"> {{{ trans('default.back')}}} </a>
		</div>
	

@stop