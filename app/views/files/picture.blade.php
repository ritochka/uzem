@section('content')

<div class="depcontent">
	@if(Session::has('message'))
	<ul class="alert alert-danger" style="list-style:none">
		{{{ Session::get('message') }}}
	</ul>
	@endif
	{{ Form::open(['url' => '/department/' . $department->name .'/picture/' . $pic . '/update', 'role' => 'form']) }}
	<div><input type="hidden" name="coords" value=""></div>
	<p id="img-box"><img class="cropbox" src="/img/pics/{{{ $department->personeldb_id }}}/{{{ $pic }}}"></p>
	<hr>
	<p>
		<a href="/department/{{{ $department->name }}}/picture/list" class="btn btn-danger btn-sm">{{{ trans('default.back')}}}</a> | 
		<button type="submit" class="btn btn-danger btn-sm">{{{ trans('default.update')}}}</button> | 
		<a href="javascript:void" class="btn btn-danger btn-sm" id="deletePic" txt="{{{ trans('default.Are you sure?') }}}">{{{ trans('default.delete')}}}</a>
	</p>
	{{ Form::close() }}
</div>

{{ Form::open(['url' => '/department/' . $department->name .'/picture/' . $pic . '/delete', 'id' => 'deleteForm', 'style' => 'display:none']) }}
{{ Form::close() }}

@stop

@section('style')
{{ HTML::style('css/jcrop/0.9.12/jquery.Jcrop.min.css') }}
@stop

@section('script')
{{ HTML::script('js/jcrop/0.9.12/jquery.Jcrop.min.js') }}

<script type="text/javascript">
	$('#deletePic').on('click', function(){
		if(confirm($(this).attr('txt')))
		{
			$('#deleteForm').submit();
		}
	});

	initJcrop();

	function initJcrop(){
		$('.cropbox').Jcrop({
			//aspectRatio: 5/1,
			minSize: [50,50],
			boxWidth: 1100,
			onSelect: updateCoords
		}, function () {
			setCoords(this);
		});
	}

	function updateCoords(c) {
		$("input[name='coords']").val('{"x": "' + Math.floor(c.x) + '", "y": "' + Math.floor(c.y) + '", "w": "' + Math.floor(c.w) + '", "h": "' + Math.floor(c.h) + '"}');
	}

	function setCoords(obj) {
		var dim = obj.getBounds();
		obj.setSelect([0, 0, Math.floor(dim[0]), Math.floor(dim[1])]);
	}
</script>

@stop
