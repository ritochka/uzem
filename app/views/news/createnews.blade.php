@section('content')

<!-- <div style="background:rgba(255,255,255,0.5); height: 500px; border-radius:4px;"> -->
<div class="depcontent">
	@include('partials.errors')

	{{ Form::open(['method' => 'POST', 'url' => '/department/'.$department->name.'/news/create', 'class' => 'form-horizontal', 'role' => 'form']) }}

	<div class="col-sm-12">
		<div class="form-group">
			{{ Form::text('title', Input::old('title'), ['class' => 'form-control', 'maxlength' => 250, 'placeholder' => trans('default.Title') ]) }}
		</div>
	</div>
	<span style="text-transform:uppercase;line-height: 1.5; vertical-align: top; margin-right:10px;">{{{ trans('default.News')}}}</span>
	{{ Form::radio('type', 1, true) }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="text-transform:uppercase;line-height: 1.5; vertical-align: top; margin-right:10px;">{{{ trans('default.Publications')}}}</span>
	{{ Form::radio('type', 2) }}
	<div class="col-sm-12">
		<div class="form-group">
			{{ Form::textarea('content', Input::old('content'), ['class' => 'form-control ckeditor']) }}
		</div>
	</div>
	
	<hr>
	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" class="btn btn-danger btn-sm">{{{ trans('default.create')}}}</button> | 
			<a href="/department/{{{ $department->name }}}/home" class="btn btn-default btn-sm">{{{ trans('default.cancel')}}}</a>
		</div>
	</div>    

	

	{{ Form::close() }}
</div>

@stop

@section('script')
{{ HTML::script('js/ckeditor/4.4.1/ckeditor.js') }}
@stop