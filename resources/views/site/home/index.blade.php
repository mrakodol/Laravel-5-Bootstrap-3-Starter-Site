@extends('site.layouts.default')
@section('carousel')
@if(count($sliders)>0)
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
      @foreach($sliders as $key =>$item)
        <div class="item @if($key == 0) active @endif">
          <img src="{{'images/photoalbum/'.$item->folderid.'/'.$item->filename }}" alt="{{$item->name}}">
          <div class="container">
            <div class="carousel-caption">
              <h2><span>{{$item->name}}</span></h2>
              <p class="caption"><span>{{$item->description}}</span></p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @if(count($sliders)>1)
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left fa-2x"></span></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right fa-2x"></span></a>
      @endif
    </div>
   @endif
@stop
@section('content')
<div class="row">
@foreach ($news as $post)
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-8">
				<h4><strong><a href="{{URL::to('news/'.$post->id.'/item')}}">{!! $post->title !!}</a></strong></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<a href="{{URL::to('news/'.$post->id.'/item')}}" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
			</div>
			<div class="col-md-10">
				<p>
					{!! $post->introduction !!}
				</p>
				<p><a class="btn btn-mini btn-default" href="{{URL::to('news/'.$post->id.'/item')}}">Read more</a></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p></p>
				<p>
					<span class="glyphicon glyphicon-user"></span> by <span class="muted">{!! $post->author->name !!}</span>
					| <span class="glyphicon glyphicon-calendar"></span> {!! $post->created_at !!}
					</p>
			</div>
		</div>
	</div>
@endforeach
</div>
@stop

@section('galeries')
	<div class="row">
	@if(count($photoalbums)>0)
	    @foreach($photoalbums as $item)
			<div class="col-sm-3">
				<div class="row">
					<a href="{{URL::to('photo/'.$item->id.'/item')}}"  class="hover-effect">
						@if($item->album_image!="")
						<img class="col-sm-12" src="{!!'images/photoalbum/'.$item->folderid.'/thumbs/'.$item->album_image !!}">
						@elseif($item->album_image_first!="")
						<img class="col-sm-12" src="{!!'images/photoalbum/'.$item->folderid.'/thumbs/'.$item->album_image_first !!}">
						@else
						<img class="col-sm-12" src="{!!'images/default-image.png' !!}">
						@endif
					</a>
					<div class=" col-sm-12">
						{!!$item->name!!}
					</div>
				</div>
			</div>
		@endforeach
	@endif
	@if(count($videoalbums)>0)
			@foreach($videoalbums as $item)
			<div class="col-sm-3">
				<div class="row">
					<a href="{{URL::to('video/'.$item->id.'/item')}}">
						@if($item->album_image!="")
						<img class="col-sm-12" src="{{{'http://img.youtube.com/vi/'.$item->album_image.'/hqdefault.jpg' }}}">
						@elseif($item->album_image_first!="")
						<img class="col-sm-12" src="{{{'http://img.youtube.com/vi/'.$item->album_image_first.'/hqdefault.jpg' }}}">
						@else
						<img class="col-sm-12" src="{{'images/default-image.png' }}">
						@endif
					</a>
					<div class=" col-sm-12">
						{!!$item->name!!}
					</div>
				</div>
			</div>
			@endforeach
	@endif
</div>
@stop
@section('scripts')
    <script>
	$('#myCarousel').carousel({
		interval:   4000
	});
</script>
@stop
