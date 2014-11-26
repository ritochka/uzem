<div class="navbar-wrappers">
	<div class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/home"><span class="glyphicon glyphicon-home" style="top:-3px;"></span></a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				@foreach($menus as $menu)
				<li class="dropdown">
					<a href="/{{{ $menu->type }}}/{{{ $menu->name }}}" @if($menu->isActive(urldecode(Request::segment(2)))) style="color: #dc3338;" @endif>{{{ $menu->getName() }}}</a>
				</li>
				@endforeach
				@if(Auth::check())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span> {{{ Auth::user()->kimlik }}}</a>
					<ul class="dropdown-menu">
						@if(Auth::check() && Auth::user()->id < 100000)
						<li><a href="/user/{{{ Auth::user()->kimlik }}}/profile"><span class="glyphicon glyphicon-user"></span> &nbsp; {{{ trans('default.Profile') }}}</a></li>
						@endif
						@if(Auth::check())
						<li><a href="/user/{{{ Auth::user()->kimlik }}}/editpass"><span class="glyphicon glyphicon-cog"></span> &nbsp; {{{ trans('default.Settings') }}}</a></li>
						@endif
						<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> &nbsp; {{{ trans('default.Message') }}} <span class="badge">0</span></a></li>
						@if(Auth::check() && User::hasRoles(['admin', 'secretary']) && Auth::user()->department_id == $department->personeldb_id)
						<li class="divider"></li>
						<li><a href="/news/create"><span class="glyphicon glyphicon-pencil"></span> &nbsp; {{{ trans('default.Create news') }}} </a></li>
						@endif
						@if(Auth::check() && User::hasRoles(['admin', 'secretary']) && Auth::user()->department_id == $department->personeldb_id)
						<li><a href="/picture/list"><span class="glyphicon glyphicon-picture"></span> &nbsp; {{{ trans('default.Pictures') }}}</a></li>
						@endif
						@if(Auth::check() && User::hasRoles(['admin']))
						<li class="divider"></li>
						<li><a href="/admin"><span class="glyphicon glyphicon-cloud"></span> &nbsp; ADMIN</a></li>
						@endif
						<li class="divider"></li>
						<li><a href="javascript:document.getElementById('logoutForm').submit()"><span class="glyphicon glyphicon-off"></span> &nbsp; {{{ trans('default.Logout') }}}</a></li>
						
					</ul>
				</li>
				@else
				<li><a href="/login?redirectUrl=/department/{{{ $department->name }}}/home" title="Login"><span class="glyphicon glyphicon-user" style="top: -1px"></span></a></li>
				@endif
			</ul>
		</div>
	</div>
</div>
{{ Form::open(['url' => '/logout?redirectUrl=/department/'. $department->name .'/home', 'id' => 'logoutForm', 'style' => 'display:none']) }}
{{ Form::close() }}



<!-- <div class="navbar-wrapper">
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
						<li><a href="/mycourses/{{{ Auth::user()->id }}}"><span class="glyphicon glyphicon-book"></span> &nbsp; my courses <span class="badge"> {{{ Auth::user()->mycoursesnumber() }}} </span></a></li>
						<li><a href="/user/{{{ Auth::user()->id }}}/edit"><span class="glyphicon glyphicon-wrench"></span> &nbsp; settings </a></li>
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
{{ Form::close() }} -->