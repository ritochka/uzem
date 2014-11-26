@section('content')

@foreach($faculties as $faculty)
<div> 
	<p style="font-weight:bold">{{{ $faculty->name }}}</p>
	@foreach($faculty->departments as $department) 
	<div style="margin-left:20px">
		<p style="font-weight:bold">{{{ $department->name }}}</p>
		@foreach($department->personnels as $personnel)
		<ul class="deppeople">
		<li>
			<a href="#" >
				{{{ $personnel->getFullname() }}}
			</a>
			<span style="margin-left:30px; color: #888; text-transform: uppercase">
				@if(in_array($personnel->Gorev_Id, [11])) {{{ $personnel->gorev->getGorev() }}} @endif
			</span>
		</li>
	</ul>
	@endforeach
	</div>
	<hr>
	@endforeach
	<hr>
</div>
@endforeach

@stop