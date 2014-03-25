@section('content')


<div> 
<h2>
	{{{ $course->code }}} : {{{ $course->name }}}
</h2>
	<table class="table table-primary">
				<tr>
					<th>
						{{{trans('default.Offered by')}}}  
					</th>
					<th>
						<a href="../department/{{{ $course->department->getName() }}}"> 
							{{{ $course->department->getName() }}} {{{ trans('default.Department')}}},  
						</a>
						<a href="../faculty/{{{ $course->department->faculty->getName() }}}"> 	
							{{{trans('default.Faculty of')}}} {{{ $course->department->faculty->getName() }}} <br/>
						</a>
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
</div>

@stop



@section('sidebar')
	@include('partials.course-sidebar')
@stop