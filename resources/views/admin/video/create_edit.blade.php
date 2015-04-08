@extends('admin.layouts.modal') @section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab"> {{
			trans("admin/modal.general") }}</a></li>
</ul>
<form class="form-horizontal" id="fupload" enctype="multipart/form-data"
	method="post"
	action="@if(isset($video)){{ URL::to('admin/video/'.$video->id.'/edit') }}
	        @else {{ URL::to('admin/video/create') }}
	        @endif"
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<div class="tab-content">
		<div class="tab-pane active" id="tab-general">
			<div class="tab-pane active" id="tab-general">
				<div
					class="form-group {{{ $errors->has('language_id') ? 'error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="language_id">{{
							trans("admin/admin.language") }}</label> <select
							style="width: 100%" name="language_id" id="language_id"
							class="form-control"> @foreach($languages as $item)
							<option value="{{$item->id}}"
								@if(!empty($language))
                                        @if($item->id==$language)
								            selected="selected" 
								        @endif 
								@endif >{{$item->name}}</option>
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
							value="{{{ Input::old('name', isset($video) ? $video->name : null) }}}" />
						{!!$errors->first('name', '<span class="help-block">:message </span>')!!}
					</div>
				</div>
				<div
					class="form-group {{{ $errors->has('photo_album_id') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="video_album_id">{{
							trans("admin/video.album") }}</label> <select
							style="width: 100%" name="video_album_id" id="video_album_id"
							class="form-control"> 
							@foreach($videoalbums as $item)
							<option value="{{$item->id}}"
								@if(!empty($videoalbum))
                                        @if($item->id==$videoalbum)
								            selected="selected" 
								        @endif 
								@endif >{{$item->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div
					class="form-group {{{ $errors->has('album_cover') ? 'has-error' : '' }}}">
					<div class="col-lg-12">
						<label class="control-label" for="album_cover">{{{
							trans('admin/photo.album_cover') }}}</label>
							<label 	class="radio"> {!! Form::radio('album_cover', 1, (Input::old('album_cover') == '1' || (isset($video) &&
							     $video->video_album_cover == '1')) ? true : false,
							         array('id'=>'showtitle', 'class'=>'radio')) !!} 
							{{{	trans('admin/admin.yes') }}} </label>
							<label class="radio">
							{!! Form::radio('album_cover', 0, (Input::old('album_cover') ==	'0' || (isset($video) && $video->video_album_cover == '0') ||
							!isset($video)) ? true : false, array('id'=>'showtitle',
							'class'=>'radio')) !!} 
							{{{ trans('admin/admin.no') }}} </label>

					</div>
				</div>
				<div
					class="form-group {{{ $errors->has('content') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="description">{{
							trans("admin/photo.description") }}</label>
						<textarea class="form-control full-width wysihtml5"
							name="description" rows="10">{{{ Input::old('content', isset($video) ? $video->description : null) }}}</textarea>
						{!! $errors->first('description', '<label class="control-label">:message</label>')!!}
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label class="control-label" for="youtube"> {{
							trans("admin/video.video_youtube") }}</label> <input
							class="form-control" type="text" name="youtube" id="youtube"
							value="{{{ Input::old('youtube', isset($video) ? $video->youtube : null) }}}" />
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
					@if (isset($video)) 
					   {{ trans("admin/modal.edit") }}
				    @else 
				        {{trans("admin/modal.create") }}
				    @endif
				</button>
			</div>
		</div>
	</div>
</form>
@stop
