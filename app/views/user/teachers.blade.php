@section('content')

@foreach($faculties as $faculty)
<div> 
	<p style="font-weight:bold">{{{ $faculty->name }}}</p>
	@foreach($faculty->departments as $department) 
	<div style="margin-left:20px">
		<p style="font-weight:bold">{{{ $department->name }}}</p>
		@foreach($department->teachers as $teacher) 
			<div style="margin-left:20px">
				<a href="user/{{{$teacher->id}}}"> 
					{{{ $teacher->user->firstname }}} {{{ $teacher->user->lastname }}}
				</a>
			</div>
		@endforeach	
	</div>
	<hr>
	@endforeach
	<hr>
</div>
@endforeach

@stop