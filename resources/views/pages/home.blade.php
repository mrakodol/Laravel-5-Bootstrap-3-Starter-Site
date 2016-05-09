@extends('layouts.app')
@section('title') Home :: @parent @endsection
@section('content')
<div class="row">
    <div class="page-header">
        <h2>Home Page</h2>
    </div></div>

    @if(count($articles)>0)
        <div class="row">
            <h2>News</h2>
            @foreach ($articles as $post)
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>
                                <strong><a href="{{url('article/'.$post->slug.'')}}">{{
                                        $post->title }}</a></strong>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{url('news/'.$post->slug.'')}}" class="thumbnail"><img
                                        src="http://placehold.it/260x180" alt=""></a>
                        </div>
                        <div class="col-md-10">
                            <p>{!! $post->introduction !!}</p>

                            <p>
                                <a class="btn btn-mini btn-default"
                                   href="{{url('news/'.$post->slug.'')}}">Read more</a>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p></p>

                            <p>
                                <span class="glyphicon glyphicon-user"></span> by <span
                                        class="muted">{{ $post->author->name }}</span> | <span
                                        class="glyphicon glyphicon-calendar"></span> {{ $post->created_at }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if(count($photoAlbums)>0)
        <div class="row">
            <h2>Photos</h2>
            @foreach($photoAlbums as $item)
                <div class="col-sm-3">
                    <div class="row">
                        <a href="{{url('photo/'.$item->id.'')}}"
                           class="hover-effect">
                            @if($item->album_image!="")
                                <img class="col-sm-12"
                                        src="{!! url('appfiles/photoalbum/'.$item->folder_id.'/'.$item->album_image) !!}">
                            @elseif($item->album_image_first!="")
                                <img class="col-sm-12"
                                     src="{!! url('appfiles/photoalbum/'.$item->folder_id.'/'.$item->album_image_first) !!}">
                            @else
                                <img class="col-sm-12" src="{!! url('appfiles/photoalbum/no_photo.png') !!}">
                            @endif
                        </a>
                        <div class=" col-sm-12">{{$item->name}}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection

