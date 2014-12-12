@section('content')

<div class="depcontent">
	<div class="panel-group" id="accordion">
		@foreach($faculties as $faculty)
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{{ $faculty->id }}}">
						{{{ $faculty->getName() }}}
					</a>
				</h4>
			</div>
			<div id="collapse-{{{ $faculty->id }}}" class="panel-collapse collapse">
				<div class="panel-body">
					@foreach ($faculty->departments as $department)
					<a href="/department/{{{ $department->name }}}/home" target="_blank" class="list-deps"><p>{{ $department->getName() }}</p></a>
					@endforeach
				</div>
			</div>
		</div>
		@endforeach
	</div>

</div>

<div class="clearfix"></div>

@stop

@section('style')
<style type="text/css">
	.list-deps, .list-deps div { color: #555; font-size: 16px !important; }
	.list-deps:hover, .list-deps div:hover { color: #1A3C96; text-decoration: none }
</style>
@stop