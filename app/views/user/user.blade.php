@section('content')

<div class="row tooltip-div depcontent">
	<div class="col-sm-2 hidden-xs" style="margin-bottom:10px;">
		<img class="img-thumbnail img-responsive avatar" src="http://manas.edu.kg/erehber/data/personel_img/{{{ $user->Kimlik }}}.jpg" onerror="this.src='/img/noimg.png'">
	</div>

	<div class="col-sm-10 col-xs-12">		
		<table class="table">
			<tr>
				<td style="width:200px">{{{ trans('default.Firstname') }}}</td>
				<td>{{{ $user->getFullname() }}}</td>
			</tr>
			
			<tr>
				<td>{{ trans('default.Email') }}</td>
				<td>{{{ $user->Eposta }}}</td>
			</tr>
			<tr>
				<td>{{ trans('default.Office') }}</td>
				<td>{{{ $user->OdaN }}}</td>
			</tr>
			<tr>
				<td>{{ trans('default.Phone') }}</td>
				<td>{{{ $user->Tel }}} ({{{ $user->Dahili }}})</td>
			</tr>
			<tr>
				<td>{{{ trans('default.Courses') }}}</td>
				<td>
					@if(count($courses) > 0)
					@foreach ($courses as $course)
					<p><a href="/dbp/{{{ $course->id }}}" target="_blank">{{{ $course->derskod }}} : {{{ $course->getName() }}}</a></p>
					@endforeach
					@endif
				</td>
			</tr>
			
		</table>
		
		@if(Auth::check() && Auth::user()->kimlik == Route::input('kimlik'))
		<a href="/department/{{{ $department->name }}}/user/{{{ $user->Kimlik }}}/edit" class="btn btn-danger" style="top: 2px; position: absolute; right: 15px;">{{{ trans('default.Edit') }}}</a>
		@endif

	</div> <!-- col-sm8 end -->

	<div class="col-sm-12">
		<h4 style="border-bottom: 1px solid #ddd">{{ trans('default.Background') }}</h4>
		<div>{{ $user2->getEducation() }}</div>
	</div>

	<div class="col-sm-12" style="margin-top:20px;">
		<h4 style="border-bottom: 1px solid #ddd">{{{ trans('default.Works') }}}</h4>
		<div>{{ $user2->getPublication() }}</div>
	</div> 

</div> <!-- row end -->
@stop

@section('style')
<style type="text/css">
	.avatar {width: 100%;}
</style>
@stop

