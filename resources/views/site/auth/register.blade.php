@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('site/user.register') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>Signup</h1>
</div>
<form method="POST" action="" accept-charset="UTF-8">
	<fieldset>
		<div class="form-group">
			<label for="username">{{{ Lang::get('site/user.username') }}}</label>
			<input class="form-control" placeholder="{{{ Lang::get('site/user.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
		</div>
		<div class="form-group">
			<label for="email">{{{ Lang::get('site/user.e_mail') }}} <small>{{ Lang::get('site/user.confirmation_required') }}</small></label>
			<input class="form-control" placeholder="{{{ Lang::get('site/user.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
		</div>
		<div class="form-group">
			<label for="password">{{{ Lang::get('site/user.password') }}}</label>
			<input class="form-control" placeholder="{{{ Lang::get('site/user.password') }}}" type="password" name="password" id="password">
		</div>
		<div class="form-group">
			<label for="password_confirmation">{{{ Lang::get('site/user.password_confirmation') }}}</label>
			<input class="form-control" placeholder="{{{ Lang::get('site/user.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
		</div>
		@if (Session::get('error'))
			<div class="alert alert-error alert-danger">
			@if (is_array(Session::get('error')))
				{{ head(Session::get('error')) }}
			@endif
			</div>
		@endif
		@if (Session::get('notice'))
			<div class="alert">{{ Session::get('notice') }}</div>
		@endif
		<div class="form-actions form-group">
			<button type="submit" class="btn btn-primary">{{{ Lang::get('site/user.submit') }}}</button>
		</div>
	</fieldset>
</form>
@stop
