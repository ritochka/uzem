@section('content')

<!-- <div style="background:rgba(255,255,255,0.5); height: 500px; border-radius:4px;"> -->
<div class="depcontent">
	@include('partials.errors')

	{{ Form::open(['url' => '/page/'.$page->name.'/edit', 'class' => 'form-horizontal', 'role' => 'form']) }}

	<div class="col-sm-12">
		<div class="form-group">
			{{ Form::textarea('content', Input::old('content', $page->getContent()), ['class' => 'form-control ckeditor']) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" class="btn btn-danger btn-sm">{{{ trans('default.update')}}}</button> | 
			<a href="/page/{{{ $page->name }}}" class="btn btn-default btn-sm">{{{ trans('default.cancel')}}}</a>
		</div>
	</div>    
	{{ Form::close() }}
</div>

@stop

@section('script')
{{ HTML::script('js/ckeditor/4.4.1/ckeditor.js') }}
@stop