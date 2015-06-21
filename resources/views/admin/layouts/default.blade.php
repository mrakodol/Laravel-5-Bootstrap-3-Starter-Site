@extends('layouts.sidenav')

{{-- Web site Title --}}
@section('title')
    Administration :: @parent
@endsection

{{-- Styles --}}
@section('styles')
    @parent

    <link href="{{ elixir('css/admin.css') }}" rel="stylesheet">

@endsection

{{-- Sidebar --}}
@section('sidebar')
    @include('admin.partials.nav')
@endsection

{{-- Scripts --}}
@section('scripts')
    @parent

    <script src="{{ elixir('js/admin.js') }}"></script>

    {{-- Not yet a part of Elixir workflow --}}
    <script src="{{asset('assets/admin/js/bootstrap-dataTables-paging.js')}}"></script>
    <script src="{{asset('assets/admin/js/datatables.fnReloadAjax.js')}}"></script>
    <script src="{{asset('assets/admin/js/modal.js')}}"></script>

    {{-- Default admin scripts--}}
    <script type="text/javascript">
        {{-- from sb-admin-2 --}}
        $(function () {
            $('.metismenu > ul').metisMenu();
        });
    </script>

@endsection
