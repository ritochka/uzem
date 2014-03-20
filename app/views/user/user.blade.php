@section('content')

	<div> 
		{{{ $user->firstname }}} - {{{ $user->lastname }}} <!-- <a href="/user/{{{ $user->id }}}/edit">edit</a> --> 
	</div>
	<table class="table table-primary">
		<tr>
			<th>
				{{{ trans('default.Affiliation')}}}
			</th>
			<th>
				{{{ $user->teacher->affiliation->institution}}}
			</th>
		</tr>
		<tr>
			<th>
				{{{ trans('default.Office')}}}
			</th>
			<th>
				{{{ $user->teacher->office}}}
			</th>
		</tr>
		<tr>
			<th>
				{{{ trans('default.email')}}}
			</th>
			<th>
				{{{ $user->email}}}
			</th>
		</tr>
		<tr>
			<th>
				{{{ trans('default.Area of Interests')}}}
			</th>
			<th>
				@foreach($user->interestareas as $area)
					{{{ $area->area}}}<br/>
				@endforeach
			</th>
		</tr>
	</table>
	@foreach ($user->courses as $course)
		{{{ $course->code }}} {{{ $course->name }}} 
	@endforeach	

	

@stop