@section('content')

	
		<div> 
			{{{ $course->code }}} : {{{ $course->name }}} <br/>
			<table class="table table-primary">
				<tr>
					<th>
						{{{trans('default.Offered by')}}}  
					</th>
					<th>
						{{{ $course->department->getName() }}}, {{{trans('default.Faculty of')}}} {{{ $course->department->faculty->getName() }}} <br/>
					</th>
				</tr>
				<tr>
					<th>
						{{{trans('default.Instructor')}}}  
					</th>
					<th>
						@foreach ($course->instructors() as $instructor)
							<a href="/user/{{{ $instructor->Kimlik }}}/profile" >
								{{{ $instructor->getFullName() }}} 
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
			<a class="btn btn-primary" href="/agreement/courses/{{{ $course->code}}}/" >
				{{{ trans('default.Enroll in class') }}}
			</a><br/> 
			<a href="/courses"> {{{ trans('default.back')}}} </a>
		</div>
	

@stop