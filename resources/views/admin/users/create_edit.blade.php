@extends('admin.layouts.modal') @section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{{
			trans('admin/modal.general') }}}</a></li>
</ul>
<form class="form-horizontal" method="post"
	action="@if (isset($user)){{ URL::to('admin/users/' . $user->id . '/edit') }}@endif"
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<div class="tab-content">
		<div class="tab-pane active" id="tab-general">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">{{
						trans('admin/users.name') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{ trans('admin/users.name') }}" type="text"
							name="name" id="name"
							value="{{{ Input::old('name', isset($user) ? $user->name : null) }}}">
					</div>
				</div>
			</div>
            @if(!isset($user))
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('username') ? 'has-error' : '' }}}">
                    <label class="col-md-2 control-label" for="username">{{
						trans('admin/users.username') }}</label>
                    <div class="col-md-10">
                        <input class="form-control" type="username" tabindex="4"
                               placeholder="{{ trans('admin/users.username') }}" name="username"
                               id="username"
                               value="{{{ Input::old('username', isset($user) ? $user->username : null) }}}" />
                        {!! $errors->first('username', '<label class="control-label"
                                                            for="username">:message</label>')!!}
                    </div>
                </div>
            </div>
			<div class="col-md-12">
				<div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
					<label class="col-md-2 control-label" for="email">{{
						trans('admin/users.email') }}</label>
					<div class="col-md-10">
						<input class="form-control" type="email" tabindex="4"
							placeholder="{{ trans('admin/users.email') }}" name="email"
							id="email"
							value="{{{ Input::old('email', isset($user) ? $user->email : null) }}}" />
						{!! $errors->first('email', '<label class="control-label"
							for="email">:message</label>')!!}
					</div>
				</div>
			</div>
			@endif
			<div class="col-md-12">
				<div class="form-group {{{ $errors->has('password') ? 'has-error' : '' }}}">
					<label class="col-md-2 control-label" for="password">{{
						trans('admin/users.password') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="5"
							placeholder="{{ trans('admin/users.password') }}"
							type="password" name="password" id="password" value="" />
						{!!$errors->first('password', '<label class="control-label"
							for="password">:message</label>')!!}
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group {{{ $errors->has('password_confirmation') ? 'has-error' : '' }}}">
					<label class="col-md-2 control-label" for="password_confirmation">{{
						trans('admin/users.password_confirmation') }}</label>
					<div class="col-md-10">
						<input class="form-control" type="password" tabindex="6"
							placeholder="{{ trans('admin/users.password_confirmation') }}"
							name="password_confirmation" id="password_confirmation" value="" />
						{!!$errors->first('password_confirmation', '<label
							class="control-label" for="password_confirmation">:message</label>')!!}
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-">
					<label class="col-md-2 control-label" for="confirm">{{
						trans('admin/users.activate_user') }}</label>
					<div class="col-md-6">
						<select class="form-control" name="confirmed" id="confirmed">
							<option value="1" {{{ ((isset($user) && $user->confirmed == 1)? '
								selected="selected"' : '') }}}>{{{ trans('admin/users.yes')
								}}}</option>
							<option value="0" {{{ ((isset($user) && $user->confirmed == 0) ?
								' selected="selected"' : '') }}}>{{{ trans('admin/users.no')
								}}}</option>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<button type="reset" class="btn btn-sm btn-warning close_popup">
				<span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("admin/modal.cancel") }}
			</button>
			<button type="reset" class="btn btn-sm btn-default">
				<span class="glyphicon glyphicon-remove-circle"></span> {{
				trans("admin/modal.reset") }}
			</button>
			<button type="submit" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-ok-circle"></span> 
				    @if	(isset($user))
				        {{ trans("admin/modal.edit") }}
				    @else
				        {{trans("admin/modal.create") }}
				    @endif
			</button>
		</div>
	</div>
</form>
@stop @section('scripts')
<script type="text/javascript">
	$(function() {
		$("#roles").select2()
	});
</script>
@stop
