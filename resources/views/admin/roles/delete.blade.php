@extends('admin.layouts.modal')
@section('content')
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab">{{ Lang::get("admin/modal.general") }}</a></li>
        </ul>
    <form id="deleteForm" class="form-horizontal" method="post" action="@if (isset($role)){{ URL::to('admin/roles/' . $role->id . '/delete') }}@endif" autocomplete="off">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $role->id }}" />
        <div class="form-group">
            <div class="controls">
               {{ Lang::get("admin/modal.delete_message") }}<br>
                <element class="btn btn-warning btn-sm close_popup"><span class="glyphicon glyphicon-ban-circle"></span>  {{ Lang::get("admin/modal.cancel") }}</element>
                <button type="submit" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> {{ Lang::get("admin/modal.delete") }}</button>
            </div>
        </div>
    </form>
@stop