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
				<div class="panel panel-default">
				<div class="panel-group" id="accordion1">
						@foreach($faculty->departments as $department)
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion1" href="#collapse-{{{ $faculty->id }}}-{{{ $department->id }}}">
										{{{ $department->name }}}
									</a>
								</h3>
							</div>
							<div id="collapse-{{{ $faculty->id }}}-{{{ $department->id }}}" class="panel-collapse collapse">
								<div class="panel-body">
									@foreach($department->courses as $course) 
									<div style="margin-left:20px">
										<a href="/course/{{{ $course->code }}}"> 
											{{{ $course->code }}} : {{{ $course->name }}}
										</a>
									</div>
									@endforeach
								</div>
							</div>
						</div>
						@endforeach
					</div>					
				</div>
			</div>
		</div>
		@endforeach
	</div>

</div>

<div class="clearfix"></div>


@stop