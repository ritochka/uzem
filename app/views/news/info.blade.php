@section('content')
<div class="depcontent">
	
	<div style="margin-top:5px;">
		<a href="/news">{{{ trans('default.back to news')}}}</a>
		<hr>
	@if(Auth::check() && User::hasRoles(['admin', 'secretary']))
		<a href="/news" class="btn btn-default btn-sm">{{{ trans('default.back')}}}</a>
		| <a href="/news/{{{ $info->id }}}/edit" class="btn btn-default btn-sm">{{{ trans('default.edit')}}}</a>
		| <a href="javascript:void" class="btn btn-default btn-sm" id="deleteNews" txt="{{{ trans('default.Are you sure?') }}}">{{{ trans('default.delete')}}}</a>
	@endif

	<hr>
	</div>

	<div style="position: absolute; right: 20px; font-style: italic; color: #999; font-size: 12px; top: 20px;">
		{{{ $info->getTime() }}}
	</div>

	<div class="content">
		<h3>{{{ $info->getTitle() }}}</h3>
		<hr>
		{{ $info->getContent() }}		
	</div>
</div>

{{ Form::open(['url' => '/news/' . $info->id . '/delete', 'id' => 'deleteForm', 'style' => 'display:none']) }}
{{ Form::close() }}

@stop

@section('script')

<script type="text/javascript">
	$('#deleteNews').on('click', function(){
		if(confirm($(this).attr('txt')))
		{
			$('#deleteForm').submit();
		}
	});
</script>

@stop
