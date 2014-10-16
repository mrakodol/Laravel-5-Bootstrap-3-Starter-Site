@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('site/user.register') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>{{{ Lang::get('site/user.register') }}}</h1>
</div>
<form method="POST" action="{{URL::to('auth/register')}}" accept-charset="UTF-8">
    <!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<!-- ./ csrf token -->
	<fieldset>
		<div class="form-group {{$errors->has('name')?'has-error':''}}">
			<label for="name">
			    {{{ Lang::get('site/user.name') }}}
			</label>
			<input class="form-control" placeholder="{{{ Lang::get('site/user.name') }}}" type="text" name="name" id="name" value="{{{ Input::old('name') }}}">
		    <span class="help-block">{!!$errors->first('name', '<span class="help-block">:message </span>')!!}</span>
        </div>
		<div class="form-group {{$errors->has('email')?'has-error':''}}">
			<label for="email">
			    {{{ Lang::get('site/user.e_mail') }}} <small>{{ Lang::get('site/user.confirmation_required') }}</small>
			</label>
			<input class="form-control" placeholder="{{{ Lang::get('site/user.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
		    <span class="help-block">{!!$errors->first('email', '<span class="help-block">:message </span>')!!}</span>
        </div>
		<div class="form-group {{$errors->has('password')?'has-error':''}}">
			<label for="password">
			    {{{ Lang::get('site/user.password') }}}
			</label>
			<input class="form-control" placeholder="{{{ Lang::get('site/user.password') }}}" type="password" name="password" id="password">
		    <span class="help-block">{!!$errors->first('password', '<span class="help-block">:message </span>')!!}</span>
        </div>
		<div class="form-group {{$errors->has('password_confirmation')?'has-error':''}}">
			<label for="password_confirmation">
			    {{{ Lang::get('site/user.password_confirmation') }}}
			</label>
			<input class="form-control" placeholder="{{{ Lang::get('site/user.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
		    <span class="help-block">{!!$errors->first('password_confirmation', '<span class="help-block">:message </span>')!!}</span>
        </div>
		<div class="form-actions form-group">
			<button type="submit" class="btn btn-primary">{{{ Lang::get('site/user.submit') }}}</button>
		</div>
	</fieldset>
</form>
@stop
