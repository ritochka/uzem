@section('content')

<div> 
	{{{ $user->firstname }}} {{{ $user->lastname }}} 
</div>
<hr>

{{{trans('default.Courses')}}}: <br/>
@foreach ($user->courses as $course)
<a href="/course/{{{ $course->code }}}"> 
	{{{ $course->code }}} {{{ $course->name }}} 
</a> <br/>
@endforeach


@stop