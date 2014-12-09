@section('content')


		@foreach($personnels as $personnel)
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
	

@stop