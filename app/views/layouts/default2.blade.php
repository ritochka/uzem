<!DOCTYPE html>
<html>
<head>
	<title>{{{ $title }}}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="/css/default/1.0.0/default.css">
	<!-- <link rel="stylesheet" type="text/css" href="/css/default/1.0.0/default.min.css"> -->
	@yield('style')
</head>
<body>
	@yield('content')

	<script src="/js/jquery/2.1.0/jquery.min.js"></script>
	<script src="/js/bootstrap/3.1.1/bootstrap.min.js"></script>
	@yield('script')
</body>
</html>