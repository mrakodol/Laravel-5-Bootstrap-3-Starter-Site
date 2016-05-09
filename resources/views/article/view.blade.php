@extends('layouts.app')
{{-- Web site Title --}}
@section('title') {!!  $article->title !!} :: @parent @endsection

@section('meta_author')
    <meta name="author" content="{!! $article->author->username !!}"/>
@endsection
{{-- Content --}}
@section('content')
    <h3>{{ $article->title }}</h3>
    <p>{!! $article->introduction !!}</p>
    @if($article->picture!="")
        <img alt="{{$article->picture}}"
             src="{!! url('appfiles/article/'.$article->id.'/'.$article->picture) !!}"/>
    @endif
    <p>{!! $article->content !!}</p>
    <div>
        <span class="badge badge-info">Posted {!!  $article->created_at !!} </span>
    </div>
@endsection
