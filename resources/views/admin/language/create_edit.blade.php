@extends('...layouts.modal')

{{-- Content --}}
@section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active">
		<a href="#tab-general" data-toggle="tab">Opšte</a>
	</li>
</ul>
<!-- ./ tabs -->
{{-- Edit Blog Form --}}
<form class="form-horizontal" enctype="multipart/form-data" method="post" 
	action="@if (isset($blog)){{ URL::to('admin/language/' . $language->id . '/edit') }}@endif" autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<!-- ./ csrf token -->
	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">
			<div class="form-group {{{ $errors->has('title') ? 'error' : '' }}}">
				<div class="col-md-12">
					<label class="control-label" for="title">Naziv</label>
					<input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name', isset($language) ? $language->name : null) }}}" />
					{{{ $errors->first('name', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<div class="form-group {{{ $errors->has('lang_code') ? 'error' : '' }}}">
				<div class="col-md-12">
					<label class="control-label" for="title">Kod jezika</label>
					<input class="form-control" type="text" name="lang_code" id="lang_code" value="{{{ Input::old('lang_code', isset($language) ? $language->lang_code : null) }}}" />
					{{{ $errors->first('lang_code', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<div class="form-group {{{ $errors->has('icon') ? 'error' : '' }}}">
				<div class="col-lg-12">
					<label class="control-label" for="icon">Ikona</label>
					<input name="icon" type="file" class="uploader" id="icon" value="Upload" /> 
				</div>
			</div>
		</div>
		<!-- ./ general tab -->
	</div>
	<!-- ./ tabs content -->

	<!-- Form Actions -->
	
	<div class="form-group">
		<div class="col-md-12">
			<button type="reset" class="btn btn-sm btn-warning close_popup">
				<span class="icon-remove"></span>  Odustani
			</button>
			<button type="reset" class="btn btn-sm btn-default">
				<span class="icon-refresh"></span> Resetuj
			</button>
			<button type="submit" class="btn btn-sm btn-success">
				<span class="icon-ok"></span> @if (isset($language)) Izmjeni @else Kreiraj @endif
			</button>
		</div>
	</div>
	<!-- ./ form actions -->
</form>
@stop