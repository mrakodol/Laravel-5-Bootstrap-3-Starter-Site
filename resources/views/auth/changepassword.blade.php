@extends('site.layouts.default') {{-- Web site Title --}}
@section('title') {{{ trans('site/user.change_password') }}} ::
@parent @stop {{-- Content --}} @section('content')
<div class="page-header">
	<h1>{{{ trans('site/user.change_password') }}}</h1>
</div>
<form method="POST" action="{{URL::to('auth/changepassword')}}"
	accept-charset="UTF-8">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<!-- ./ csrf token -->
	<fieldset>
		<div class="form-group">
			<label for="password">{{{ trans('site/user.password') }}}</label>
			<input class="form-control"
				placeholder="{{{ trans('site/user.password') }}}"
				type="password" name="password" id="password">
		</div>
		<div class="form-group">
			<label for="password_confirmation">{{{
				trans('site/user.password_confirmation') }}}</label> <input
				class="form-control"
				placeholder="{{{ trans('site/user.password_confirmation') }}}"
				type="password" name="password_confirmation"
				id="password_confirmation">
		</div>
		@if ($errors->has()) @foreach ($errors->all() as $error)
		<div class="alert alert-danger">{{ $error }}</div>
		@endforeach @endif
		<div class="form-actions form-group">
			<button type="submit" class="btn btn-primary">{{{
				trans('site/user.submit') }}}</button>
		</div>
	</fieldset>
</form>
@stop
