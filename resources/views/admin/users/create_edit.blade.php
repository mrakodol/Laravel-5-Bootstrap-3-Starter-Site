@extends('admin.layouts.modal')
@section('content')
<ul class="nav nav-tabs">
	<li class="active">
		<a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/modal.general') }}}</a>
	</li>
</ul>
<form class="form-horizontal" method="post" action="@if (isset($user)){{ URL::to('admin/users/' . $user->id . '/edit') }}@endif" autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<div class="tab-content">
		<div class="tab-pane active" id="tab-general">
			<div class="col-md-12">
			<div class="form-group">
				<label class="col-md-2 control-label" for="name">{{ Lang::get('admin/users.name') }}</label>
				<div class="col-md-10">
					<input class="form-control" tabindex="1" placeholder="{{ Lang::get('admin/users.name') }}" type="text" name="name" id="name" value="{{{ Input::old('name', isset($user) ? $user->name : null) }}}">
				</div>
			</div>
			</div>
			@if(!isset($user))
                <div class="col-md-12">
                <div class="form-group {{{ $errors->has('email') ? 'error' : '' }}}">
                    <label class="col-md-2 control-label" for="email">{{ Lang::get('admin/users.email') }}</label>
                    <div class="col-md-10">
                        <input class="form-control" type="email" tabindex="4" placeholder="{{ Lang::get('admin/users.email') }}" name="email" id="email" value="{{{ Input::old('email', isset($user) ? $user->email : null) }}}" />
                        {{{ $errors->first('email', '<span class="help-inline">:message</span>') }}}
                    </div>
                </div>
                </div>
			@endif
			<div class="col-md-12">
			<div class="form-group {{{ $errors->has('password') ? 'error' : '' }}}">
				<label class="col-md-2 control-label" for="password">{{ Lang::get('admin/users.password') }}</label>
				<div class="col-md-10">
					<input class="form-control"  tabindex="5" placeholder="{{ Lang::get('admin/users.password') }}" type="password" name="password" id="password" value="" />
					{{{ $errors->first('password', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			</div>
			<div class="col-md-12">
			<div class="form-group {{{ $errors->has('password_confirmation') ? 'error' : '' }}}">
				<label class="col-md-2 control-label" for="password_confirmation">{{ Lang::get('admin/users.password_confirmation') }}</label>
				<div class="col-md-10">
					<input class="form-control" type="password" tabindex="6" placeholder="{{ Lang::get('admin/users.password_confirmation') }}"  name="password_confirmation" id="password_confirmation" value="" />
					{{{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			</div>
			<div class="col-md-12">
			<div class="form-">
				<label class="col-md-2 control-label" for="confirm">{{ Lang::get('admin/users.activate_user') }}</label>
				<div class="col-md-6">
					<select class="form-control" name="confirmed" id="confirmed">
						<option value="1"{{{ ((isset($user) && $user->confirmed == 1)? ' selected="selected"' : '') }}}>{{{ Lang::get('admin/users.yes') }}}</option>
						<option value="0"{{{ ((isset($user) && $user->confirmed == 0) ? ' selected="selected"' : '') }}}>{{{ Lang::get('admin/users.no') }}}</option>
					</select>
				</div>
			</div>
			</div>
			<div class="col-md-12">
			<br>
			</div>
			<div class="col-md-12">
			<div class="form-group">
				<label class="col-md-2 control-label" for="roles">{{ Lang::get('admin/users.roles') }}</label>
				<div class="col-md-6">
					<select name="roles[]" id="roles" multiple style="width:100%;">
						@foreach ($roles as $role)
						<option value="{{{ $role->id }}}"{{{ ( array_search($role->id, $selectedRoles) !== false && array_search($role->id, $selectedRoles) >= 0 ? ' selected="selected"' : '') }}}>{{{ $role->name }}}</option>
						@endforeach
					</select>

					<span class="help-block"> {{ Lang::get('admin/users.roles_info') }} </span>
				</div>
			</div>
			</div>
		</div>
	</div>
	<div class="form-group">
        <div class="col-md-12">
            <button type="reset" class="btn btn-sm btn-warning close_popup">
                <span class="glyphicon glyphicon-ban-circle"></span>  {{ Lang::get("admin/modal.cancel") }}
            </button>
            <button type="reset" class="btn btn-sm btn-default">
                <span class="glyphicon glyphicon-remove-circle"></span>  {{ Lang::get("admin/modal.reset") }}
            </button>
            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span> @if (isset($user))  {{ Lang::get("admin/modal.edit") }} @else  {{ Lang::get("admin/modal.create") }} @endif
            </button>
        </div>
    </div>
</form>
@stop
@section('scripts')
<script type="text/javascript">
	$(function() {
		$("#roles").select2()
	});
</script>
@stop
