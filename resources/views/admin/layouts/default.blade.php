<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@section('title') Administration @show</title>
    @section('meta_keywords')
        <meta name="keywords" content="your, awesome, keywords, here"/>
    @show @section('meta_author')
        <meta name="author" content="Jon Doe"/>
    @show @section('meta_description')
        <meta name="description"
              content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei."/>
    @show
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <script src="{{ asset('js/admin.js') }}"></script>
    @yield('styles')
</head>
<body>
<div id="wrapper">
    @include('admin.partials.nav')
    <div id="page-wrapper">
        @yield('main')
    </div>
</div>

<script type="text/javascript">
    @if(isset($type))
    var oTable;
    $(document).ready(function () {
        oTable = $('#table').DataTable({
            "oLanguage": {
                "sProcessing": "{{ trans('table.processing') }}",
                "sLengthMenu": "{{ trans('table.showmenu') }}",
                "sZeroRecords": "{{ trans('table.noresult') }}",
                "sInfo": "{{ trans('table.show') }}",
                "sEmptyTable": "{{ trans('table.emptytable') }}",
                "sInfoEmpty": "{{ trans('table.view') }}",
                "sInfoFiltered": "{{ trans('table.filter') }}",
                "sInfoPostFix": "",
                "sSearch": "{{ trans('table.search') }}:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "{{ trans('table.start') }}",
                    "sPrevious": "{{ trans('table.prev') }}",
                    "sNext": "{{ trans('table.next') }}",
                    "sLast": "{{ trans('table.last') }}"
                }
            },
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": "{{ url('admin/'.$type.'/data') }}",
            "pagingType": "full_numbers",
            "fnDrawCallback": function (oSettings) {
                $(".iframe").colorbox({
                    iframe: true,
                    width: "80%",
                    height: "80%",
                    onClosed: function () {
                        oTable.ajax.reload();
                    }
                });
            }
        });
    });
    @endif
</script>
@yield('scripts')
</body>
</html>