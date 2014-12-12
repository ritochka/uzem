@section('content')

<div class="login">
	<a href="{{{ Input::get('redirectUrl', '/') }}}" class="logo"><img src="/img/logo3.png"></a>
	<form method="post" action="/reminder?redirectUrl={{{ Input::get('redirectUrl', '/') }}}" role="form">
		{{ Form::token() }}
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="text" name="kimlik" class="form-control" value="{{{ Input::old('kimlik') }}}" required autofocus maxlength="10">
		</div>
		<div class="input-group">
		{{ Form::captcha() }}
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">{{{ trans('default.Send') }}}</button>
	</form>

	<a href="/login?redirectUrl={{{ Input::get('redirectUrl', '/') }}}"> {{{ trans('default.Login') }}}</a>

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
	.login {width: 317px; margin: 0 auto; text-align: center}
	.login .logo img { width: 120px; margin: 10px}
	.login .input-group, .login button {margin-bottom: 10px}
	.login input {text-align: center; color: #999; font-weight: bold}
	.login .alert-danger {list-style: none; font-weight: bold; padding-left: 40px}
</style>

@stop