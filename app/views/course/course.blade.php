@section('content')

	
		<div> 
			{{{ $course->code }}} : {{{ $course->name }}} <br/>
			<table class="table table-primary">
				<tr>
					<th>
						{{{trans('default.Offered by')}}}  
					</th>
					<th>
						{{{ $course->department->getName() }}}, {{{trans('default.Faculty')}}} {{{ $course->department->faculty->getName() }}} <br/>
					</th>
				</tr>
				<tr>
					<th>
						{{{trans('default.Instructor')}}}  
					</th>
					<th>
						@foreach ($course->instructors as $instructor)
							<a href="/user/{{{ $instructor->id }}}" >
								{{{ $instructor->firstname }}} {{{ $instructor->lastname }}}
							</a><br/> 
						@endforeach						
					</th>
				</tr>
				<tr>
					<th>
						{{{trans('default.Credits')}}} 
					</th>
					<th>
						{{{ $course->credit }}} ({{{$course->credit_theory}}}-{{{$course->credit_practice}}})<br/>
					</th>
				</tr>
			</table>
			<table>
				<tr>
					<th>
						{{{ $course->description }}}
					</th>
				</tr>
			</table>
			<a href="/courses"> {{{ trans('default.back')}}} </a>
		</div>
	

@stop