@section('content')

<div> 
	{{{ $user->firstname }}} {{{ $user->lastname }}} <!-- <a href="/user/{{{ $user->id }}}/edit">edit</a> --> 
</div>
<hr>
<div>
	@foreach($user->roles as $role)
	<div>
		{{{ $role->name }}}
	</div>
	@endforeach
</div>
<hr>
<div>
	@if(Auth::user()->hasRoles(['teacher']))
	<p>true</p>
	@else
	<p>false</p>
	@endif
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
	<tr>
		<th>
			{{{ trans('default.Education')}}}
		</th>
		<th>
			@foreach($user->educations as $education)
			{{{ $education->edtype->degree}}}: 
			{{{ $education->studied->institution}}},
			{{{ trans('default.Department of')}}}
			{{{ $education->department}}},
			{{{ $education->graduated}}} <br/>
			@endforeach
		</th>
	</tr>
</table>
{{{trans('default.Courses')}}}: <br/>
@foreach ($user->courses as $course)
<a href="/course/{{{ $course->code }}}"> 
	{{{ $course->code }}} {{{ $course->name }}} 
</a> <br/>
@endforeach
{{{trans('default.Publications')}}}:	<br/>
@foreach ($user->publications as $publication)
{{{ $publication->title }}}<br/>
@endforeach


@stop