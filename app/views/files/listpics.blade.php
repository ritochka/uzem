@section('content')

<div class="depcontent">
	<a href="/picture/create" class="btn btn-primary btn-sm">{{{ trans('default.create')}}}</a>
	<hr>
	@foreach($pics as $pic)
	<div class="piclist">
		<a href="/picture/{{{ basename($pic) }}}">
			<img src="/{{{ $pic }}}" class="dep-pics">
		</a>
		<p style="font-size: 10px; color: #666;">{{{ URL::to($pic) }}}</p>
	</div>
	@endforeach
	<div class="clearfix"></div>
</div>

@stop

@section('style')
<style type="text/css">
	.piclist { float:left; margin: 10px 15px; text-align: center; border-bottom: 1px dotted #ccc; }
	.dep-pics { height: 100px; }
</style>
@stop