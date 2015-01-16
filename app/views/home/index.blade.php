@section('content')

<div class="depcontent">
	<div class="row">
		<div class="col-sm-6">	
			<img src="/img/homepics/Animation.gif" style="width:100%;" onerror="this.height=0">					
		</div>
		
		<div class="col-sm-3">
			<h4 class="dep-news-header">{{{ trans('default.News')}}}</h4>
			<ul class="dep-news-list">
				@foreach($news as $new)
				<li> 
					<a href="/news/{{{ $new->id }}}"> {{{ str_limit($new->getTitle(), 27) }}} </a>
				</li>
				@endforeach
			</ul>
			<div class="read-more">
				<a href="#">{{{ trans('default.More') }}} >></a>
			</div>
		</div>
		<div class="col-sm-3">
			<h4 class="dep-news-header" style="text-transform: uppercase">{{{ trans('default.New Courses')}}}</h4>
			<ul class="dep-news-list">
				@foreach($courses as $course)
				<li> 
					<a href="/course/courses/{{{ $course->code }}}"> {{{ $course->code }}} - {{{ str_limit($course->name, 27)  }}} </a>
				</li>
				@endforeach
			</ul>
			<div class="read-more">
				<a href="#" >{{{ trans('default.More') }}} >></a>
			</div>
		</div>
	</div>
	<h4 class="dep-news-header" style="text-transform: uppercase; margin-top:20px;">{{{ trans('default.Visit Us at')}}}</h4>
	@for($i = 1; $i < 7; $i++)
		<div class="col-sm-2 hidden-xs" style="margin-bottom:20px; margin-top:10px;">
		<a href="" target="_blank">
			<img src="/img/Logo/used_logos/{{{ $i }}}_{{{ App::getLocale() }}}.png" style="width:100%;" onerror="this.height=0">
		</a>
		</div>
	@endfor
</div>

@stop

@section('style')

<style type="text/css">
	.dep-news-header { color: #777; font-weight: bold; margin-top: 0; border-bottom: 2px solid #de3338; }
	.dep-news-list { list-style: circle; padding-left: 18px; color: #de3338; overflow: hidden; }
	.dep-news-list li { padding:7px; border-bottom: 1px solid #ccc;	min-width: 400px; }
	.dep-news-list a { color: #777; }
	.read-more { font-style: italic; font-weight: 11px; font-weight: bold; text-align: right; }
	.read-more a { color: #999; text-decoration: none; }
	.read-more a:hover { color: #999; }
</style>

@stop