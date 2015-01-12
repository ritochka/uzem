@section('content')

<div class="depcontent">
	@if(Session::has('message'))
	<ul class="alert alert-danger" style="list-style:none">
		{{{ Session::get('message') }}}
	</ul>
	@endif
	{{ Form::open(['url' => '/file/' . $file . '/update', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}
	<a href="{{{ URL::to('img/files/'.$file) }}}" target="_blank">{{{ $file }}}</a>
	<hr>
	<input type="file" name="file" accept="application/pdf,application/vnd.ms-excel,application/msword">
	<hr>
	<p>
		<a href="/file/list" class="btn btn-primary btn-sm">{{{ trans('default.back')}}}</a> | 
		<button type="submit" class="btn btn-primary btn-sm">{{{ trans('default.update')}}}</button> | 
		<a href="javascript:void" class="btn btn-primary btn-sm" id="deletefile" txt="{{{ trans('default.Are you sure?') }}}">{{{ trans('default.delete')}}}</a>
	</p>
	{{ Form::close() }}
</div>

{{ Form::open(['url' => '/file/' . $file . '/delete', 'id' => 'deleteForm', 'style' => 'display:none']) }}
{{ Form::close() }}

@stop

@section('script')
<script type="text/javascript">
	$('#deletefile').on('click', function(){
		if(confirm($(this).attr('txt')))
		{
			$('#deleteForm').submit();
		}
	});
</script>
@stop
