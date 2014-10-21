@extends('site.layouts.default')

{{-- Content --}}
@section('content')
@foreach ($news as $post)
<div class="row">
	<div class="col-md-8">
		<!-- Post Title -->
		<div class="row">
			<div class="col-md-8">
				<h4><strong><a href="#">{!! $post->title !!}</a></strong></h4>
			</div>
		</div>
		<!-- ./ post title -->

		<!-- Post Content -->
		<div class="row">
			<div class="col-md-2">
				<a href="#" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
			</div>
			<div class="col-md-6">
				<p>
					{{ $post->short }}
				</p>
				<p><a class="btn btn-mini btn-default" href="#">Read more</a></p>
			</div>
		</div>
		<!-- ./ post content -->

		<!-- Post Footer -->
		<div class="row">
			<div class="col-md-8">
				<p></p>
				<p>
					<span class="glyphicon glyphicon-user"></span> by <span class="muted">{!! $post->author->name !!}</span>
					| <span class="glyphicon glyphicon-calendar"></span> {!! $post->created_at !!}
					</p>
			</div>
		</div>
		<!-- ./ post footer -->
	</div>
</div>

<hr />
@endforeach

@stop
