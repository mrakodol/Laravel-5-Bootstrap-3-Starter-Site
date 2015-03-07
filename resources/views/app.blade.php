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

    <link href="{{elixir('css/app.css')}}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon"
          href="{{{ asset('assets/site/ico/favicon.ico') }}}">
</head>
<body>
@include('partials.nav')



<div class="container">
    @include('flash::message')
    @yield('content')
</div>

@yield('footer')

<!-- Scripts -->
{{-- TODO: convert to elixir --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script>
    $('#flash-overlay-modal').modal();
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
</script>

</body>
</html>
