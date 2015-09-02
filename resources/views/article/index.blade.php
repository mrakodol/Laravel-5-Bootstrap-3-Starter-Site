@extends('layouts.app')
{{-- Web site Title --}}
@section('title')
	@parent
@stop

@section('content')
	@foreach($articles as $item)
		<h3>{{ $item->title }}</h3>
		<p>{!! $item->introduction !!}</p>
		<div>
			<a class="btn btn-success" href="{{ URL::to('article/'.$item->slug) }}">Read more</a>
		</div>
	@endforeach
	{!! $articles->render() !!}
@stop
