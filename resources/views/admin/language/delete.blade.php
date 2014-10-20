@extends('...layouts.modal')

{{-- Content --}}
@section('content')

    <!-- Tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab">Opšte</a></li>
        </ul>
    <!-- ./ tabs -->
    {{-- Delete Post Form --}}
    <form id="deleteForm" class="form-horizontal" method="post" action="@if (isset($language)){{ URL::to('admin/language/' . $language->id . '/delete') }}@endif" autocomplete="off">
        
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $language->id }}" />
        <!-- <input type="hidden" name="_method" value="DELETE" /> -->
        <!-- ./ csrf token -->

        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
               Da li želite obrisati jezik?<br>
                <element class="btn btn-warning btn-sm close_popup"><span class="icon-remove"></span> Odustani</element>
                <button type="submit" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> Obriši</button>
            </div>
        </div>
        <!-- ./ form actions -->
    </form>
@stop