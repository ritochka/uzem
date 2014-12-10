@section('content')

<div class="depcontent">
	<div style="font-size: 18px;font-weight: bold; font-style:italic; color: #2E548E;"> {{{trans('default.Faculties')}}} </div>
	<div class="panel-group" id="accordion">
		@foreach($faculties as $faculty)
		@if($faculty->order < 100)
		
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
					<a href="http://dep.manas.edu.kg/department/{{{ $department->name }}}/home" target="_blank" class="list-deps"><p>{{ $department->getName() }}</p></a>
					@endforeach
				</div>
			</div>
		</div>
		@endif
		@endforeach
	</div>


	<div style="font-size: 18px;font-weight: bold; font-style:italic; color: #2E548E;"> {{{trans('default.Higher Schools')}}} </div>
	<div class="panel-group" id="accordion">
		@foreach($faculties as $faculty)
		@if($faculty->order > 100 && $faculty->order < 200)
		
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
					<a href="http://dep.manas.edu.kg/department/{{{ $department->name }}}/home" target="_blank" class="list-deps"><p>{{ $department->getName() }}</p></a>
					@endforeach

				</div>
			</div>						
		</div>
		@endif
		@endforeach
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a href="http://myo.manas.edu.kg/index.php" target="_blank">
						{{{ trans('default.MYO') }}}
					</a>
				</h4>
			</div>
		</div>


	</div>

	<div style="font-size: 18px;font-weight: bold; font-style:italic; color: #2E548E;"> {{{trans('default.Graduate Schools')}}} </div>
	<div class="panel-group" id="accordion">
		@foreach($faculties as $faculty)
		@if($faculty->order > 200)
		
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
					<a href="http://dep.manas.edu.kg/department/{{{ $department->name }}}/home" target="_blank" class="list-deps"><p>{{ $department->getName() }}</p></a>
					@endforeach

				</div>
			</div>						
		</div>
		@endif
		@endforeach
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a href="http://manas.edu.kg/index.php/academicen/institutes/2014-02-28-06-31-01" target="_blank">
						{{{ trans('default.FBE') }}}
					</a>
				</h4>
			</div>
			</div>
			<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a href="http://manas.edu.kg/index.php/academicen/institutes/2014-02-28-06-31-52" target="_blank">
						{{{ trans('default.SBE') }}}
					</a>
				</h4>
			</div>
		</div>


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