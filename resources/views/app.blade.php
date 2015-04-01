<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@section('title') Laravel 5 Sample Site @show</title>
    @section('meta_keywords')
        <meta name="keywords" content="your, awesome, keywords, here"/>
    @show @section('meta_author')
        <meta name="author" content="Jon Doe"/>
    @show @section('meta_description')
        <meta name="description"
              content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei."/>
    @show

		<link href="{{ asset('/css/all.css') }}" rel="stylesheet">
    {{--<link href="{{elixir('css/all.css')}}" rel="stylesheet">--}}

    {{-- TODO: Incorporate into elixer workflow. --}}
    <link rel="stylesheet"
          href="{{asset('assets/site/css/half-slider.css')}}">
    <link rel="stylesheet"
          href="{{asset('assets/site/css/justifiedGallery.min.css')}}"/>
    <link rel="stylesheet"
          href="{{asset('assets/site/css/lightbox.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/site/css/bootstrap-theme.min.css')}}">

    @yield('styles')

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="{{{ asset('assets/site/ico/favicon.ico') }}}">
</head>
<body>
@include('partials.nav')

@include('flash::message')
<div class="container">
@yield('content')
</div>
@include('partials.footer')

<!-- Scripts -->
<script src="{{ asset('/js/all.js') }}"></script>
{{--<script src="{{ elixir('js/all.js') }}"></script>--}}

{{-- TODO: Incorporate into elixir workflow. --}}
<script src="{{asset('assets/site/js/jquery.justifiedGallery.min.js')}}"></script>
<script src="{{asset('assets/site/js/lightbox.min.js')}}"></script>

<script>
    $('#flash-overlay-modal').modal();
    $('div.alert').not('.alert-danger').delay(3000).slideUp(300);
</script>
@yield('scripts')

</body>
</html>
