<!DOCTYPE html>
<html>
<title> {{{ trans('default.MANAS Online') }}} </title>
<head>
	<title>{{{ $title }}}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" onerror="this.href='/css/bootstrap/3.1.1/css/bootstrap.min.css'">
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" onerror="this.href='/css/bootstrap/3.1.1/css/bootstrap-theme.min.css'">
	<link rel="stylesheet" type="text/css" href="/css/default/1.0.0/default.css">
	<!-- <link rel="stylesheet" type="text/css" href="/css/default/1.0.0/default.min.css"> -->
	@yield('style')
</head>
<body>
	<div class="container">
		@include('partials.banner')
		@include('partials.menu')
		<div style="border:1px solid #ccc;" class="col-md-3 visible-md visible-lg">
			@yield('sidebar')
		</div>
		<div style="border:1px solid #ccc;" class="col-md-9 col-xs-12">
			@yield('content')
		</div>		
	</div>
	<div class="container">
		@include('partials.footer')
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="/js/jquery/2.1.0/jquery.min.js"><\/script>')</script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script>$.fn.button || document.write('<script src="/js/bootstrap/3.1.1/bootstrap.min.js"><\/script>')</script>
	@yield('script')
</body>
</html>