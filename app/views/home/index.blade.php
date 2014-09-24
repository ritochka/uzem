@section('content')

<div class="depcontent">
	<div class="row">
		
		<div class="col-sm-12 hidden-xs" style="margin-bottom:20px;">
			<img src="http://ofigenno.cc/content/496-0/1.jpg" style="width:100%;" onerror="this.height=0">
		</div>


		<div class="col-sm-4">
			<h4 class="dep-news-header"> {{{ trans('default.Quick Links')}}} </h4>
			<ul class="dep-news-list">
				<li><a href="http://oidb.manas.edu.kg/" target="_blank"> {{{trans('default.Student Affairs')}}} </a></li>
				<li><a href="http://library.manas.kg/" target="_blank">{{{trans('default.Library')}}}</a></li>
				<li><a href="http://manas.edu.kg/index.php/tr/documents" target="_blank">{{{trans('default.Forms and Documents')}}}</a></li>
				<li><a href="">{{{trans('default.Laboratories')}}}</a></li>
				<li><a href="#">{{{trans('default.Course Schedule')}}}</a></li>
				<li><a href="http://ihale.manas.edu.kg/kki.php" target="_blank">{{{trans('default.Cafeteria')}}}</a></li>
				<li><a href="http://mdp.manas.edu.kg/" target="_blank">{{{trans('default.Students Exchange Program')}}}</a></li>
			</ul>
		</div>
		<div class="col-sm-4">
			<h4 class="dep-news-header">{{{ trans('default.News')}}}</h4>
			<ul class="dep-news-list">
				@foreach($news as $new)
				<li> 
					<a href="#"> {{{ str_limit($new->getName(), 45) }}} </a>
				</li>
				@endforeach
			</ul>
			<div class="read-more">
				<a href="#">{{{ trans('default.More') }}} >></a>
			</div>
		</div>
		<div class="col-sm-4">
			<h4 class="dep-news-header" style="text-transform: uppercase">{{{ trans('default.New Courses')}}}</h4>
			<ul class="dep-news-list">
				@foreach($news as $new)
				<li> 
					<a href="#"> {{{ str_limit($new->getName(), 45)  }}} </a>
				</li>
				@endforeach
			</ul>
			<div class="read-more">
				<a href="#" >{{{ trans('default.More') }}} >></a>
			</div>
		</div>
	</div>
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