@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active">
		<a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/modal.general') }}}</a>
	</li>
</ul>
<!-- ./ tabs -->

{{-- Edit Role Form --}}
<form class="form-horizontal" method="post" action="" autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<!-- ./ csrf token -->

	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">
			<div class="col-md-12">
			<div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
				<label class="col-md-2 control-label" for="name">{!! Lang::get('admin/role.name') !!}</label>
				<div class="col-md-10">
					<input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name', isset($role) ? $role->name : null) }}}" />
					{{{ $errors->first('name', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			</div>
			<div class="col-md-12">
			<div class="form-group">
			<label class="col-md-2 control-label" for="name">{!! Lang::get('admin/role.choose_role') !!}</label>
				<div class="col-md-10">
                <select tabindex="3" name="permission[]" id="permission" multiple="" style="width:350px;" data-placeholder="{!! Lang::get('admin/role.choose_role') !!}">
		             <optgroup label="{!! Lang::get('admin/role.userrole') !!}">
		            	@foreach ($permissionsUser as $permission)
		            	<option value="{{{ $permission['id'] }}}"
		            	@foreach($permisionsadd as $item)
		            		@if($item['permission_id']==$permission['id']) selected='selected';
		            		@endif
		            	@endforeach
		            	>{{{ $permission['display_name'] }}}</option>
		            @endforeach
		             </optgroup>
  					<optgroup label="{!! Lang::get('admin/role.adminrole') !!}">
		             	@foreach ($permissionsAdmin as $permission)
		            	<option value="{{{ $permission['id'] }}}"
		            	@foreach($permisionsadd as $item)
		            		@if($item['permission_id']==$permission['id']) selected='selected';
		            		@endif
		            	@endforeach
		            	>{!! $permission['display_name'] !!}</option>
		            @endforeach
		            </optgroup>
		          </select>
		        </div>
		    </div>
		    </div>
		</div>
		<!-- ./ General tab -->
	</div>
	<!-- ./ tabs content -->

	<!-- Form Actions -->
	<div class="form-group">
		<div class="col-md-12">
			<button type="reset" class="btn btn-sm btn-warning close_popup">
                <span class="glyphicon glyphicon-ban-circle"></span>  {{ Lang::get("admin/modal.cancel") }}
            </button>
            <button type="reset" class="btn btn-sm btn-default">
                <span class="glyphicon glyphicon-remove-circle"></span>  {{ Lang::get("admin/modal.reset") }}
            </button>
            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span> @if (isset($role))  {{ Lang::get("admin/modal.edit") }} @else  {{ Lang::get("admin/modal.create") }} @endif
            </button>
		</div>
	</div>
	<!-- ./ form actions -->
</form>
@stop
{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
	$(function() {
		$("#permission").select2() // 0-based index;  
	});
</script>
@stop
