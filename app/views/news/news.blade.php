@section('content')

<div class="depcontent">
	<h4 class="dep-news-header">{{{ trans('default.News')}}}</h4>
	<ul class="dep-news-list">
		@foreach($infos as $info)
		<li> 
			<a href="/news/{{{ $info->id }}}"> {{{ $info->getTitle() }}} </a>
		</li>
		@endforeach
	</ul>

	

</div>

<div style="margin-left: 20px;">
	{{ $infos->links() }}
</div>

@stop