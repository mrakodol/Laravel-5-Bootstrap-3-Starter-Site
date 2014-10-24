@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop
{{-- Content --}}
@section('content')
<div class="page-header">
  <h2>{{$title}}</h2>
</div>
<div class="row">
     <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-bullhorn fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$newscategory}}</div>
                            <div>{{ Lang::get("admin/admin.news_categories") }}!</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('admin/newscategory')}}">
                    <div class="panel-footer">
                        <span class="pull-left">{{ Lang::get("admin/admin.view_detail") }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$news}}</div>
                        <div>{{ Lang::get("admin/admin.news_items") }}!</div>
                    </div>
                </div>
            </div>
            <a href="{{URL::to('admin/news')}}">
                <div class="panel-footer">
                    <span class="pull-left">{{ Lang::get("admin/admin.view_detail") }}</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$photoalbum}}</div>
                        <div>{{ Lang::get("admin/admin.photo_albums") }}!</div>
                    </div>
                </div>
            </div>
            <a href="{{URL::to('admin/photoalbum')}}">
                <div class="panel-footer">
                    <span class="pull-left">{{ Lang::get("admin/admin.view_detail") }}</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-camera fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$photo}}</div>
                            <div>{{ Lang::get("admin/admin.photo_items") }}!</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('admin/photo')}}">
                    <div class="panel-footer">
                        <span class="pull-left">{{ Lang::get("admin/admin.view_detail") }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$videoalbum}}</div>
                        <div>{{ Lang::get("admin/admin.video_albums") }}!</div>
                    </div>
                </div>
            </div>
            <a href="{{URL::to('admin/videoalbum')}}">
                <div class="panel-footer">
                    <span class="pull-left">{{ Lang::get("admin/admin.view_detail") }}</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
     <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-facetime-video fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$video}}</div>
                            <div>{{ Lang::get("admin/admin.video_items") }}!</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('admin/video')}}">
                    <div class="panel-footer">
                        <span class="pull-left">{{ Lang::get("admin/admin.view_detail") }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$users}}</div>
                        <div>{{ Lang::get("admin/admin.users") }}!</div>
                    </div>
                </div>
            </div>
            <a href="{{URL::to('admin/users')}}">
                <div class="panel-footer">
                    <span class="pull-left">{{ Lang::get("admin/admin.view_detail") }}</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
@stop