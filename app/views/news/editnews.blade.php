@section('content')

<!-- <div style="background:rgba(255,255,255,0.5); height: 500px; border-radius:4px;"> -->
<div class="depcontent">
	@include('partials.errors')

	{{ Form::open(['url' => '/department/'.$department->name.'/news/'.$info->id.'/edit', 'class' => 'form-horizontal', 'role' => 'form']) }}

	<div class="col-sm-12">
		<div class="form-group">
			{{ Form::text('title', Input::old('title', $info->getTitle()), ['class' => 'form-control', 'maxlength' => 250]) }}
		</div>
	</div>
	<span style="text-transform:uppercase;line-height: 1.5; vertical-align: top; margin-right:10px;">{{{ trans('default.News')}}}</span>
	{{ Form::radio('type', 1, $info->type == 1) }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="text-transform:uppercase;line-height: 1.5; vertical-align: top; margin-right:10px;">{{{ trans('default.Publications')}}}</span>
	{{ Form::radio('type', 2, $info->type == 2) }}
	<div class="col-sm-12">
		<div class="form-group">
			{{ Form::textarea('content', Input::old('content', $info->getContent()), ['class' => 'form-control ckeditor']) }}
		</div>
	</div>
	
	<hr>
	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" class="btn btn-danger btn-sm">{{{ trans('default.update')}}}</button> | 
			<a href="/department/{{{ $department->name }}}/news/{{{ $info->id }}}" class="btn btn-default btn-sm">{{{ trans('default.cancel')}}}</a>
		</div>
	</div>    
	{{ Form::close() }}
</div>

@stop

@section('script')
{{ HTML::script('js/ckeditor/4.3.4/ckeditor.js') }}
@stop