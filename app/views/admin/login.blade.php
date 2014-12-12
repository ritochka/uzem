@section('content')

<div class="login">
	<a href="{{{ Input::get('redirectUrl', '/') }}}" class="logo"><img src="/img/logo3.png"></a>
	<div style="font-size:14px; vertical-align:middle;  text-align: center; margin-left: 5px; font-weight:bold; color: #82B6E4;">
		{{ trans('default.KTMU2')}}
	</div>
	<div style="font-size:34px; font-weight:bold;  font-style: italic; padding-bottom: 15px; vertical-align:middle; text-align:center; color: #dc3338;">
		{{ trans('default.DEC') }}
	</div>

	<form method="post" action="/login?redirectUrl={{{ Input::get('redirectUrl', '/') }}}" role="form">
		{{ Form::token() }}
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="text" name="kimlik" class="form-control" value="{{{ Input::old('kimlik') }}}" required autofocus maxlength="100">
		</div>
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			<input type="password" name="password" class="form-control" value="{{{ Input::old('password') }}}" required maxlength="100">
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">{{{ trans('default.Login') }}}</button>
	</form>
	<a href="/reminder?redirectUrl={{{ Input::get('redirectUrl', '/') }}}"> {{{ trans('default.Forgot Password') }}}</a>

	@include('partials.errors')
	@if(Session::has("message"))
	<div class="alert alert-danger">
		{{ Session::get("message") }}
	</div>
	@endif
</div>

@stop

@section('style')
<style type="text/css">
	.login {width: 400px; margin: 0 auto; text-align: center}
	.login .logo img { width: 120px; margin: 10px}
	.login .input-group, .login button {margin-bottom: 10px}
	.login input {text-align: center; color: #999; font-weight: bold}
	.login .alert-danger {list-style: none; font-weight: bold; padding-left: 40px}
</style>

@stop