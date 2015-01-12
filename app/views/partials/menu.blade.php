<div class="navbar-wrappers blue-menu menu-style" style="padding-top: 10px;">
	<div class="navbar navbar-default" role="navigation">
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
				@foreach($menus as $menu)
				<li class="dropdown">
					<a href="/{{{ $menu->type }}}/{{{ $menu->name }}}" @if($menu->isActive(urldecode(Request::segment(2)))) style="font-weight: bolder; color: #82B6E4;" @endif>{{{ $menu->getName() }}}</a>
				</li>
				@endforeach
			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span> {{{ Auth::user()->kimlik }}}</a>
					<ul class="dropdown-menu">
						@if(Auth::check() && Auth::user()->id < 100000)
						<li>
						<a href="/user/{{{ Auth::user()->kimlik }}}/profile" style="font-style: italic; color: #2b5290;"><span class="glyphicon glyphicon-user"></span> &nbsp; {{{ trans('default.Profile') }}}</a></li>
						@endif
						@if(Auth::check())
						<li><a href="/user/{{{ Auth::user()->kimlik }}}/editpass" style="font-style: italic; color: #2b5290;"><span class="glyphicon glyphicon-cog"></span> &nbsp; {{{ trans('default.Settings') }}}</a></li>
						@endif
						<li><a href="#" style="font-style: italic; color: #2b5290;"><span class="glyphicon glyphicon-envelope"></span> &nbsp; {{{ trans('default.Message') }}} <span class="badge">0</span></a></li>
						@if(Auth::check() && User::hasRoles(['admin', 'instructor']))
						<li class="divider"></li>
						<li><a href="/news/create" style="font-style: italic; color: #2b5290;"><span class="glyphicon glyphicon-pencil"></span> &nbsp; {{{ trans('default.Create news') }}} </a></li>
						@endif
						@if(Auth::check() && User::hasRoles(['admin', 'secretary']))
						<li><a href="/picture/list"  style="font-style: italic; color: #2b5290;"><span class="glyphicon glyphicon-picture"></span> &nbsp; {{{ trans('default.Pictures') }}}</a></li>
						<li><a href="/file/list"  style="font-style: italic; color: #2b5290;"><span class="glyphicon glyphicon-folder-open"></span> &nbsp; {{{ trans('default.Files') }}}</a></li>
						@endif
						@if(Auth::check() && User::hasRoles(['admin']))
						<li class="divider"></li>
						<li><a href="/admin"><span class="glyphicon glyphicon-cloud" style="font-style: italic; color: #2b5290;"></span> &nbsp; ADMIN</a></li>
						@endif
						<li class="divider"></li>
						<li><a href="javascript:document.getElementById('logoutForm').submit()" style="font-style: italic; color: #2b5290;"><span class="glyphicon glyphicon-off"></span> &nbsp; {{{ trans('default.Logout') }}}</a></li>
						
					</ul>				
				</li>
				
				@else
				<li><a href="/login" title="Login"><span class="glyphicon glyphicon-user" style="top: -1px"></span></a></li>
				@endif
			</ul>
		</div>
	</div>
</div>
{{ Form::open(['url' => '/logout', 'id' => 'logoutForm', 'style' => 'display:none']) }}
{{ Form::close() }}