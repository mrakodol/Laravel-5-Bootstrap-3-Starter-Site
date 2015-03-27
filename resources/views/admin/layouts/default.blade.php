@extends('layouts.sidenav')

{{-- Web site Title --}}
@section('title')
    Administration :: @parent
@endsection

{{-- Styles --}}
@section('styles')
    @parent

    {{--<link href="{{asset('assets/admin/css/plugins/metisMenu/metisMenu.min.css')}}"--}}
    {{--rel="stylesheet">--}}
    {{--<link href="{{asset('assets/admin/css/sb-admin-2.css')}}"--}}
    {{--rel="stylesheet">--}}
    {{--<link href="{{asset('assets/admin/css/jquery.dataTables.css')}}"--}}
    {{--rel="stylesheet">--}}
    {{--<link href="{{asset('assets/admin/css/dataTables.bootstrap.css')}}"--}}
    {{--rel="stylesheet">--}}
    {{--<link href="{{asset('assets/admin/css/colorbox.css')}}" rel="stylesheet">--}}


@endsection

{{-- Sidebar --}}
@section('sidebar')
    @include('admin.partials.nav')
@endsection

{{-- Scripts --}}
@section('scripts')
    @parent

    {{-- Not yet a part of Elixir workflow --}}
    {{--<script src="{{asset('assets/admin/js/jquery-migrate-1.2.1.min.js')}}"></script>--}}
    {{--<script src="{{asset('assets/admin/js/jquery-ui.1.11.2.min.js')}}"></script>--}}
    {{--<script src="{{asset('assets/admin/js/plugins/metisMenu/metisMenu.min.js')}}"></script>--}}
    {{--<script src="{{asset('assets/admin/js/sb-admin-2.js')}}"></script>--}}

    {{--<script src="{{asset('assets/admin/js/jquery.dataTables.min.js')}}"></script>--}}
    {{--<script src="{{asset('assets/admin/js/dataTables.bootstrap.js')}}"></script>--}}
    <script src="{{asset('assets/admin/js/bootstrap-dataTables-paging.js')}}"></script>
    <script src="{{asset('assets/admin/js/datatables.fnReloadAjax.js')}}"></script>
    <script src="{{asset('assets/admin/js/jquery.colorbox.js')}}"></script>
    <script src="{{asset('assets/admin/js/modal.js')}}"></script>



    {{-- Default admin scripts--}}
    <script type="text/javascript">
        {{-- from sb-admin-2 --}}
        $(function () {
            $('#menu').metisMenu();
        });
    </script>

@endsection
