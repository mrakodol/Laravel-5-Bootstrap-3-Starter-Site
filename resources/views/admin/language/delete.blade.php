@extends('admin.layouts.modal') @section('content')
<form id="deleteForm" class="form-horizontal" method="post"
	action="{{ URL::to('admin/language/' . $language . '/delete') }}"
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> <input
		type="hidden" name="id" value="{{ $language }}" />
	<div class="form-group">
		<div class="controls">
			{{ trans("admin/modal.delete_message") }}<br>
			<element class="btn btn-warning btn-sm close_popup">
			<span class="glyphicon glyphicon-ban-circle"></span> {{
			trans("admin/modal.cancel") }}</element>
			<button type="submit" class="btn btn-sm btn-danger">
				<span class="glyphicon glyphicon-trash"></span> {{
				trans("admin/modal.delete") }}
			</button>
		</div>
	</div>
</form>
@stop
