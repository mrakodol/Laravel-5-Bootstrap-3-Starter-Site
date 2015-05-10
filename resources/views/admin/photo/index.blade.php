@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/photo.photo") }}} @parent @stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {{{ trans("admin/photo.photo") }}}
            <div class="pull-right">
                <a href="{{{ URL::to('admin/photo/create') }}}"
                   class="btn btn-sm  btn-primary iframe"><span
                            class="glyphicon glyphicon-plus-sign"></span> {{
				trans("admin/modal.new") }}</a>
            </div>
        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>{{{ trans("admin/modal.title") }}}</th>
            <th>{{{ trans("admin/photo.album") }}}</th>
            <th>{{{ trans("admin/photo.album_cover") }}}</th>
            <th>{{{ trans("admin/photo.slider") }}}</th>
            <th>{{{ trans("admin/admin.language") }}}</th>
            <th>{{{ trans("admin/admin.created_at") }}}</th>
            <th>{{{ trans("admin/admin.action") }}}</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')
    @parent
    <script type="text/javascript">
        var oTable;
        $(document).ready(function () {
            oTable = $('#table').DataTable({
                "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "sPaginationType": "bootstrap",

                "processing": true,
                "serverSide": true,
                "ajax": "{{ URL::to('admin/photo/data/'.((isset($album))?$album->id:0)) }}",
                "fnDrawCallback": function (oSettings) {
                    $(".iframe").colorbox({
                        iframe: true,
                        width: "80%",
                        height: "80%",
                        onClosed: function () {
                            window.location.reload();
                        }
                    });
                }
            });
            var startPosition;
            var endPosition;
            $("#table tbody").sortable({
                cursor: "move",
                start: function (event, ui) {
                    startPosition = ui.item.prevAll().length + 1;
                },
                update: function (event, ui) {
                    endPosition = ui.item.prevAll().length + 1;
                    var navigationList = "";
                    $('#table #row').each(function (i) {
                        navigationList = navigationList + ',' + $(this).val();
                    });
                    $.getJSON("{{ URL::to('admin/photo/reorder') }}", {
                        list: navigationList
                    }, function (data) {
                    });
                }
            });
        });
    </script>
@stop
