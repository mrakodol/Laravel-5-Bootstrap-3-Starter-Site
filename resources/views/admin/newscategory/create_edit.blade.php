@extends('admin.layouts.modal') {{-- Content --}} @section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab"> {{
			trans("admin/modal.general") }}</a></li>
</ul>
<!-- ./ tabs -->
{{-- Edit Blog Form --}}
<form class="form-horizontal" enctype="multipart/form-data"
	method="post"
	action="@if(isset($newscategory)){{ URL::to('admin/newscategory/'.$newscategory->id.'/edit') }}
	        @else{{ URL::to('admin/newscategory/create') }}@endif"
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
				<div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="title"> {{
							trans("admin/modal.title") }}</label> <input
							class="form-control" type="text" name="title" id="title"
							value="{{{ Input::old('title', isset($newscategory) ? $newscategory->title : null) }}}" />
						{!!$errors->first('title', '<span class="help-block">:message </span>')!!}
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
					<span class="glyphicon glyphicon-ban-circle"></span> {{
					trans("admin/modal.cancel") }}
				</button>
				<button type="reset" class="btn btn-sm btn-default">
					<span class="glyphicon glyphicon-remove-circle"></span> {{
					trans("admin/modal.reset") }}
				</button>
				<button type="submit" class="btn btn-sm btn-success">
					<span class="glyphicon glyphicon-ok-circle"></span> 
					@if (isset($newscategory)) 
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
