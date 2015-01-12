@section('content')

<div class="depcontent">
	<a href="/file/create" class="btn btn-primary btn-sm">{{{ trans('default.create')}}}</a>
	<hr>
	@foreach($files as $file)
	<div class="filelist">
		<a href="/file/{{{ basename($file) }}}">
			{{{ URL::to($file) }}}
		</a>
	</div>
	@endforeach
	<div class="clearfix"></div>
</div>

@stop

@section('style')
<style type="text/css">
	.filelist { float:left; margin: 10px 15px; text-align: center; border-bottom: 1px dotted #ccc; }
	.dep-files { height: 100px; }
</style>
@stop