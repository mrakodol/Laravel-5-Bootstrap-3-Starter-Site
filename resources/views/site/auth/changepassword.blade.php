@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('site/user.change_password') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>{{{ Lang::get('site/user.change_password') }}}</h1>
</div>
<form method="POST" action="{{URL::to('auth/changepassword')}}" accept-charset="UTF-8">
    <!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<!-- ./ csrf token -->
	<fieldset>
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
