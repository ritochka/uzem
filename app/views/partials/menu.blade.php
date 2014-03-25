<div class="navbar-wrapper">
	<div class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"><span class="glyphicon glyphicon-home"></span></a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="#">{{{ trans('default.About us') }}}</a></li>
				<li><a href="/courses">{{{ trans('default.Courses') }}}</a></li>
				<li><a href="/faculties">{{{ trans('default.Faculties') }}}</a></li>
				<li><a href="/teachers">{{{ trans('default.People') }}}</a></li>
				<li><a href="#">{{{ trans('default.Contact Us') }}}</a></li>
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/user/{{{ Auth::user()->id }}}"><span class="glyphicon glyphicon-user"></span> &nbsp; profile</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> &nbsp; message <span class="badge">0</span></a></li>
						<li class="divider"></li>
						<li><a href="javascript:document.getElementById('logoutForm').submit()"><span class="glyphicon glyphicon-off"></span> &nbsp; logout</a></li>
					</ul>
				</li>
				@else
				<li><a href="/login" title="Login"><span class="glyphicon glyphicon-user"></span></a></li>
				@endif
			</ul>
		</div>
	</div>
</div>
{{ Form::open(['url' => '/logout', 'id' => 'logoutForm', 'style' => 'display:none']) }}
{{ Form::close() }}