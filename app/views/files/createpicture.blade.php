@section('content')

<div class="depcontent">
	@if(Session::has('message'))
	<ul class="alert alert-danger" style="list-style:none">
		{{{ Session::get('message') }}}
	</ul>
	@endif
	<p> {{{ trans('default.Maximum size for pic is 600 Kb')}}} </p>
	{{ Form::open(['url' => '/picture/create', 'role' => 'form']) }}
	<input type="hidden" name="coords" value="">
	<input type="hidden" name="dataUrl" value="">
	<input type="file" name="file" accept="image/jpeg" id="upload-input" class="form-control" style="">
	<div id="img-box"><img class="cropbox" src=""></div>
	<div>
		<a href="/picture/list" class="btn btn-primary btn-sm">{{{ trans('default.back')}}}</a> | 
		<button type="submit" class="btn btn-primary btn-sm">{{{ trans('default.update')}}}</button>
	</div>
	{{ Form::close() }}
</div>

@stop

@section('style')
{{ HTML::style('css/jcrop/0.9.12/jquery.Jcrop.min.css') }}
<style type="text/css">
	#img-box { margin: 10px 0; }
</style>
@stop

@section('script')
{{ HTML::script('js/jcrop/0.9.12/jquery.Jcrop.min.js') }}

<script type="text/javascript">
	$("#upload-input").on("change", function(){
		var file   = this.files[0];
		if(file.size < 1000000)
		{
			var reader = new FileReader();
			reader.readAsDataURL(file);		
			reader.onload = function(){
				$("#img-box").html('<img class="cropbox" src="' + reader.result + '">');
				$("input[name='dataUrl']").val(reader.result.substring(reader.result.indexOf(";base64,") + 8));
				initJcrop();
			}
		}
		else
		{
			alert('Image size is too big');
		}
	});

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
