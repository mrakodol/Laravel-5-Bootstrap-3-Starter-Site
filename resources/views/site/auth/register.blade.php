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
<form method="POST" action="{{URL::to('user/register')}}" accept-charset="UTF-8">
	<fieldset>
		<div class="form-group">
			<label for="name">{{{ Lang::get('site/user.name') }}}</label>
			<input class="form-control" placeholder="{{{ Lang::get('site/user.name') }}}" type="text" name="name" id="name" value="{{{ Input::old('name') }}}">
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
		@if ($errors->has())
			@foreach ($errors->all() as $error)
	        	<div class="alert alert-danger">{{ $error }}</div>
	        @endforeach
        @endif
		<div class="form-actions form-group">
			<button type="submit" class="btn btn-primary">{{{ Lang::get('site/user.submit') }}}</button>
		</div>
	</fieldset>
</form>
@stop
