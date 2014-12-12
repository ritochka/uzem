<div class="navbar-wrapper">
	<div class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{{ route('admin-home') }}}"><span class="glyphicon glyphicon-home" style="top:-3px;"></span></a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="{{{ route('admin-reset-password') }}}">password</a></li>
				<li><a href="{{{ route('admin-reset-email') }}}">email</a></li>
				<li><a href="{{{ route('admin-personnel') }}}">personnel</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/department/{{{ Auth::user()->department->name }}}/home"><span class="glyphicon glyphicon-user"></span> &nbsp; DEPARMENT</a></li>
						<li class="divider"></li>
						<li><a href="javascript:document.getElementById('logoutForm').submit()"><span class="glyphicon glyphicon-off"></span> &nbsp; LOGOUT</a></li>
						
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
{{ Form::open(['url' => '/logout?redirectUrl=/admin', 'id' => 'logoutForm', 'style' => 'display:none']) }}
{{ Form::close() }}