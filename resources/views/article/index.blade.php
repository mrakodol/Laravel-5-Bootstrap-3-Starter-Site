@extends('layouts.app')
{{-- Web site Title --}}
@section('title')
	@parent
@endsection

@section('content')
	@foreach($articles as $item)
		<h3>{{ $item->title }}</h3>
		<p>{!! $item->introduction !!}</p>
		<div>
			<a class="btn btn-success" href="{{ url('article/'.$item->slug) }}">Read more</a>
		</div>
	@endforeach
	{!! $articles->render() !!}
@endsection
