@extends('layouts.app')
@section('title')
    {!! $photo_album->name !!} :: @parent @endsection
@section('content')
    <h3>{!! $photo_album->name !!}</h3>
    <div id="mygallery">
        @foreach($photos as $item)
            <a href="{!! url('appfiles/photoalbum/'.$photo_album->folder_id.'/'.$item->filename) !!}">
                <img alt="{{$item->name}}" src="{!!url('appfiles/photoalbum/'.$photo_album->folder_id.'/'.$item->filename) !!}"/>
            </a>
        @endforeach
    </div>
@endsection
@section('scripts')
    <script>
        $("#mygallery").justifiedGallery();
    </script>
@endsection
