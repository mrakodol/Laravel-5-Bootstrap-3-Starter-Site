@extends('admin.layouts.modal') {{-- Content --}} @section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab"> {{
			trans("admin/modal.general") }}</a></li>
</ul>
<!-- ./ tabs -->
<form class="form-horizontal" enctype="multipart/form-data"
	method="post"
	action="@if(isset($language)){{ URL::to('admin/language/'.$language->id.'/edit') }}
	        @else{{ URL::to('admin/language/create') }}@endif"
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<div class="tab-content">
		<div class="tab-pane active" id="tab-general">
			<div
				class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
				<div class="col-md-12">
					<label class="control-label" for="name"> {{
						trans("admin/modal.title") }}</label> <input
						class="form-control" type="text" name="name" id="name"
						value="{{{ Input::old('name', isset($language) ? $language->name : null) }}}" />
					{!!$errors->first('name', '<label class="control-label" for="name">:message</label>')!!}
				</div>
			</div>
			<div
				class="form-group {{{ $errors->has('lang_code') ? 'has-error' : '' }}}">
				<div class="col-md-12">
					<label class="control-label" for="lang_code">{{
						trans("admin/language.code") }}</label> <input
						class="form-control" type="text" name="lang_code" id="lang_code"
						value="{{{ Input::old('lang_code', isset($language) ? $language->lang_code : null) }}}" />
					{!!$errors->first('lang_code', '<label class="control-label"
						for="name">:message</label>')!!}
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-12">
					<label class="control-label" for="icon">{{
						trans("admin/language.icon") }}</label> <input name="icon"
						type="file" class="uploader" id="icon" value="Upload" />
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
				@if (isset($language)) 
				    {{ trans("admin/modal.edit") }}
				@else 
				    {{trans("admin/modal.create") }}
			     @endif
			</button>
		</div>
	</div>
</form>
@stop
