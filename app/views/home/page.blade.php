@section('content')

<!-- <div style="background:rgba(255,255,255,0.5); height: 500px; border:1px solid #de3338; border-radius:4px;"> -->
<div class="depcontent">
	@if(Auth::check() && User::hasRoles(['admin', 'secretary']) && Auth::user()->department_id == $department->personeldb_id)
	<div style="margin-top:5px;">
		<a href="/department/{{{ $department->name }}}/page/{{{ $page->name }}}/edit" class="btn btn-danger btn-sm">{{{ trans('default.Edit')}}}</a>
	</div>
	@endif

	<div>
		{{ $page->getContent() }}
	</div>
</div>

@stop