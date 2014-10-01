@section('content')

<div class="jumbotron hidden-xs" style="margin-bottom: 60px">
	<div class="container">
		<h1>Hello, world!</h1>
		<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
		<p><a class="btn btn-primary btn-lg" role="button">Learn more »</a></p>
	</div>
</div>

@foreach ($news as $key => $new)
<hr class="featurette-divider" @if($key == 0) style="display:none" @endif>
<div class="row featurette">
	@if($key % 2)	
	<div class="col-md-5" style="margin-right: -5px; text-align: center">
		<img class="featurette-image img-responsive visible-md visible-lg img-thumbnail" src="/img/course/ed_tech.jpg" alt="Generic placeholder image">
	</div>
	<div class="col-md-7">
		<h2 class="featurette-heading"><a href="/">{{{ $new->title }}} </a><span class="text-muted">See for yourself.</span></h2>
		<p class="lead featurette-text"> {{{$new->description}}} </p>
	</div>
	@else
	<div class="col-md-7">
		<h2 class="featurette-heading"><a href="/">{{{ $new->title }}} </a></h2>
		<p class="lead featurette-text"> {{{$new->description}}} </p>
	</div>
	<div class="col-md-5" style="margin-left: -5px; text-align: center">
		<img class="featurette-image img-responsive visible-md visible-lg img-thumbnail" src="/img/course/action_research.jpg" alt="Generic placeholder image">
	</div>
	@endif
</div>
@endforeach



<!-- @foreach ($courses as $key => $course)
<hr class="featurette-divider" @if($key == 0) style="display:none" @endif>
<div class="row featurette">
	@if($key % 2)	
	<div class="col-md-5" style="margin-right: -5px; text-align: center">
		<img class="featurette-image img-responsive visible-md visible-lg img-thumbnail" src="/img/course/ed_tech.jpg" alt="Generic placeholder image">
	</div>
	<div class="col-md-7">
		<h2 class="featurette-heading"><a href="/">{{{ $course->name }}} </a><span class="text-muted">See for yourself.</span></h2>
		<p class="lead featurette-text"> {{{$course->description}}} </p>
	</div>
	@else
	<div class="col-md-7">
		<h2 class="featurette-heading"><a href="/">{{{ $course->name }}} </a></h2>
		<p class="lead featurette-text"> {{{$course->description}}} </p>
	</div>
	<div class="col-md-5" style="margin-left: -5px; text-align: center">
		<img class="featurette-image img-responsive visible-md visible-lg img-thumbnail" src="/img/course/action_research.jpg" alt="Generic placeholder image">
	</div>
	@endif
</div>
@endforeach -->

@stop

@section('style')
<style type="text/css">
.featurette-divider { margin: 5px 0; border-color:#ddd; }
.featurette-heading { line-height: 1; letter-spacing: -1px; }
.featurette-heading a {color: inherit; text-decoration: none}
.featurette-text {text-align: justify}

@media (min-width: 992px) {
	.featurette-divider { margin: 60px 0; border-color:#ddd; }
	.featurette-heading { font-size: 50px; }
	.featurette div { float: none; display: inline-block; vertical-align: middle; }
}
</style>
@stop