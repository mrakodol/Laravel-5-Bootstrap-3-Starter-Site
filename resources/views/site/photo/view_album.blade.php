@extends('site.layouts.default')
@section('title')
    {{{ $photo_album->name }}} ::
    @parent
@stop
@section('content')
    <h3>{{{ $photo_album->name }}}</h3>

    <div id="mygallery">
    @foreach($photos as $item)
        <a href="{{{'../../images/photoalbum/'.$photo_album->folderid.'/'.$item->filename }}}" data-lightbox="roadtrip" >
            <img alt="{{$item->name}}" src="{{{'../../images/photoalbum/'.$photo_album->folderid.'/thumbs/'.$item->filename }}}"/>
        </a>
     @endforeach
    </div>
@stop
@section('scripts')
    <script>
        $("#mygallery").justifiedGallery();
    </script>
@stop