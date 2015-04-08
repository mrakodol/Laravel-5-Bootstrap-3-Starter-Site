@extends('admin.layouts.modal') {{-- Content --}} @section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab"> {{
			trans("admin/modal.general") }}</a></li>
</ul>
<!-- ./ tabs -->
{{-- Edit Blog Form --}}
<form class="form-horizontal" id="fupload" enctype="multipart/form-data"
	method="post"
	action="@if(isset($photo)){{ URL::to('admin/photo/'.$photo->id.'/edit') }}
	        @else{{ URL::to('admin/photo/create') }}@endif"
	autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<!-- ./ csrf token -->
	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">
			<div class="tab-pane active" id="tab-general">
				<div
					class="form-group {{{ $errors->has('language_id') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="language_id">{{
							trans("admin/admin.language") }}</label> <select
							style="width: 100%" name="language_id" id="language_id"
							class="form-control"> @foreach($languages as $item)
							<option value="{{$item->id}}"
								@if(!empty($language))
                                        @if($item->id==$language)
								selected="selected" @endif @endif >{{$item->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div
					class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="name"> {{
							trans("admin/modal.title") }}</label> <input
							class="form-control" type="text" name="name" id="name"
							value="{{{ Input::old('name', isset($photo) ? $photo->name : null) }}}" />
						{!!$errors->first('name', '<span class="help-block">:message </span>')!!}
					</div>
				</div>
				<div
					class="form-group {{{ $errors->has('photo_album_id') ? 'error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="photo_album_id">{{
							trans("admin/photo.album") }}</label> <select
							style="width: 100%" name="photo_album_id" id="photo_album_id"
							class="form-control"> @foreach($photoalbums as $item)
							<option value="{{$item->id}}"
								@if(!empty($photoalbum))
                                        @if($item->id==$photoalbum)
								selected="selected" @endif @endif >{{$item->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div
					class="form-group {{{ $errors->has('slider') ? 'has-error' : '' }}}">
					<div class="col-lg-12">
						<label class="control-label" for="slider">{{{
							trans('admin/photo.slider') }}}</label> <label class="radio">
							{!! Form::radio('slider', 1, (Input::old('slider') == '1' ||
							(isset($photo) && $photo->slider == '1')) ? true : false,
							array('id'=>'slider', 'class'=>'radio')) !!} {{{
							trans('admin/admin.yes') }}} </label> <label class="radio">
							{!! Form::radio('slider', 0, (Input::old('slider') == '0' ||
							(isset($photo) && $photo->slider == '0') || !isset($photo)) ?
							true : false, array('id'=>'slider', 'class'=>'radio')) !!} {{{
							trans('admin/admin.no') }}} </label>

					</div>
				</div>
				<div
					class="form-group {{{ $errors->has('album_cover') ? 'has-error' : '' }}}">
					<div class="col-lg-12">
						<label class="control-label" for="album_cover">{{{
							trans('admin/photo.album_cover') }}}</label> <label
							class="radio"> {!! Form::radio('album_cover', 1,
							(Input::old('album_cover') == '1' || (isset($photo) &&
							$photo->album_cover == '1')) ? true : false,
							array('id'=>'showtitle', 'class'=>'radio')) !!} {{{
							trans('admin/admin.yes') }}} </label> <label class="radio">
							{!! Form::radio('album_cover', 0, (Input::old('album_cover') ==
							'0' || (isset($photo) && $photo->album_cover == '0') ||
							!isset($photo)) ? true : false, array('id'=>'showtitle',
							'class'=>'radio')) !!} {!! trans('admin/admin.no') !!} </label>

					</div>
				</div>
				<div
					class="form-group {{{ $errors->has('content') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="description">{{
							trans("admin/photo.description") }}</label>
						<textarea class="form-control full-width wysihtml5"
							name="description" rows="10">{{{ Input::old('content', isset($photo) ? $photo->description : null) }}}</textarea>
						{!! $errors->first('description', '<label class="control-label">:message</label>')
						!!}
					</div>
				</div>

				<div
					class="form-group {{{ $errors->has('image') ? 'error' : '' }}}">
					<div class="col-lg-12">
						<label class="control-label" for="image">{{
							trans("admin/photo.picture") }}</label> <input name="image"
							type="file" class="uploader" id="image" value="Upload" />
					</div>

				</div>
				<!-- ./ general tab -->
			</div>
			<!-- ./ tabs content -->

			<!-- Form Actions -->

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
						@if	(isset($photo)) 
						  {{ trans("admin/modal.edit") }}
						@else 
						  {{trans("admin/modal.create") }}
						 @endif
					</button>
				</div>
			</div>
			<!-- ./ form actions -->

</form>
@stop
