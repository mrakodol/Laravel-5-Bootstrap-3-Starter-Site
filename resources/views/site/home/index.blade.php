@extends('site.layouts.default')
@section('carousel')
<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">  
      <div class="carousel-inner">
        <div class="item active">
          <!--<img src="img/slider/Fotolia_30977559_XS.jpg" alt="slide 1">-->
          <img src="http://placehold.it/1500x400/cccccc/ffffff" alt="Slide1">
          <div class="container">
            <div class="carousel-caption">
              <h2><span>Carousel Headline 1</span></h2>
              <p class="caption"><span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</span></p>
              <p><a class="btn btn-danger" href="#">Read More <i class="fa fa-angle-double-right"></i></a>
            </p></div>
          </div>
        </div>
        <div class="item">
          <!--<img src="img/slider/Fotolia_30986037_S.jpg" alt="slide 2">-->
          <img src="http://placehold.it/1500x400/999999/cccccc" alt="Slide2">
          <div class="container">
            <div class="carousel-caption">
              <h2><span>Carousel Headline 2</span></h2>
              <p class="caption"><span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</span></p>
              <p><a class="btn btn-danger" href="#">Read More <i class="fa fa-angle-double-right"></i></a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="http://placehold.it/1500x400/dddddd/333333" alt="Slide3">
          <div class="container">
            <div class="carousel-caption">
              <h2><span>Carousel Headline 3</span></h2>
              <p class="caption"><span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</span></p>
              <p><a class="btn btn-danger" href="#">Read More <i class="fa fa-angle-double-right"></i></a></p>
            </div>
          </div>
        </div>
      </div>
      <!-- Controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left fa-2x"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right fa-2x"></span></a>  
    </div>
    <!-- /.carousel -->
@stop
{{-- Content --}}
@section('content')
@foreach ($news as $post)
<div class="row">
	<div class="col-md-6">
		<!-- Post Title -->
		<div class="row">
			<div class="col-md-8">
				<h4><strong><a href="{{URL::to('news/'.$post->id.'/item')}}">{!! $post->title !!}</a></strong></h4>
			</div>
		</div>
		<!-- ./ post title -->

		<!-- Post Content -->
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
		<!-- ./ post content -->

		<!-- Post Footer -->
		<div class="row">
			<div class="col-md-12">
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
@section('script')
    <script>
	$('#myCarousel').carousel({
		interval:   4000
	});
</script>
@stop
