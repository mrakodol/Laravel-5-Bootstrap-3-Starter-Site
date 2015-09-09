@extends('admin.layouts.modal')
{{-- Content --}}
@section('content')
        <!-- Tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-general" data-toggle="tab"> {{
			trans("admin/modal.general") }}</a></li>
</ul>
<!-- ./ tabs -->
@if (isset($photo))
{!! Form::model($photo, array('url' => URL::to('admin/photo') . '/' . $photo->id, 'method' => 'put','id'=>'fupload','class' => 'bf', 'files'=> true)) !!}
@else
{!! Form::open(array('url' => URL::to('admin/photo'), 'method' => 'post', 'class' => 'bf','id'=>'fupload', 'files'=> true)) !!}
@endif
        <!-- Tabs Content -->
<div class="tab-content">
    <!-- General tab -->
    <div class="tab-pane active" id="tab-general">
        <div class="form-group  {{ $errors->has('language_id') ? 'has-error' : '' }}">
            {!! Form::label('language_id', trans("admin/admin.language"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::select('language_id', $languages, @isset($photo)? $photo->language_id : 'default', array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('language_id', ':message') }}</span>
            </div>
        </div>
        <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('name', trans("admin/modal.title"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('name', ':message') }}</span>
            </div>
        </div>
        <div class="form-group  {{ $errors->has('photo_album_id') ? 'has-error' : '' }}">
            {!! Form::label('photo_album_id', trans("admin/photo.album"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::select('photo_album_id', $photoalbums, @isset($photo)? $photo->photo_album_id : 'default', array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('photo_album_id', ':message') }}</span>
            </div>
        </div>
        <div class="form-group  {{ $errors->has('slider') ? 'has-error' : '' }}">
            {!! Form::label('slider', trans("admin/photo.slider"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::label('slider', trans("admin/admin.yes"), array('class' => 'control-label')) !!}
                {!! Form::radio('slider', '1', @isset($photo)? $photo->photo_album_id : 'false') !!}
                {!! Form::label('slider', trans("admin/admin.no"), array('class' => 'control-label')) !!}
                {!! Form::radio('slider', '0', @isset($photo)? $photo->photo_album_id : 'true') !!}
                <span class="help-block">{{ $errors->first('slider', ':message') }}</span>
            </div>
        </div>
        <div class="form-group  {{ $errors->has('album_cover') ? 'has-error' : '' }}">
            {!! Form::label('album_cover', trans("admin/photo.album_cover"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::label('album_cover', trans("admin/admin.yes"), array('class' => 'control-label')) !!}
                {!! Form::radio('album_cover', '1', @isset($photo)? $photo->photo_album_id : 'false') !!}
                {!! Form::label('album_cover', trans("admin/admin.no"), array('class' => 'control-label')) !!}
                {!! Form::radio('album_cover', '0', @isset($photo)? $photo->photo_album_id : 'true') !!}
                <span class="help-block">{{ $errors->first('album_cover', ':message') }}</span>
            </div>
        </div>

        <div class="form-group  {{ $errors->has('description') ? 'has-error' : '' }}">
            {!! Form::label('description', trans("admin/photo.description"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('description', ':message') }}</span>
            </div>
        </div>

        <div
                class="form-group {{ $errors->has('image') ? 'error' : '' }}">
            <div class="col-lg-12">
                <label class="control-label" for="image">
                    {{ trans("admin/photo.picture") }}</label>
                <input name="image" type="file" class="uploader" id="image" value="Upload"/>
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
{!! Form::close() !!}
</div>
@stop
