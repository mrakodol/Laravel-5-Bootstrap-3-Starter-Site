<!DOCTYPE html>

<html lang="en">

	<head id="Starter-Site">

		<meta charset="UTF-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title> Administration </title>

		<meta name="keywords" content="@yield('keywords')" />
		<meta name="author" content="@yield('author')" />
		<!-- Google will often use this as its description of your page/site. Make it good. -->
		<meta name="description" content="@yield('description')" />
		<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
		<meta name="google-site-verification" content="">
		<!-- Dublin Core Metadata : http://dublincore.org/ -->
		<meta name="DC.title" content="Project Name">
		<meta name="DC.subject" content="@yield('description')">
		<meta name="DC.creator" content="@yield('author')">
		<!--  Mobile Viewport Fix -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<script src="{{asset('assets/admin/js/jquery-migrate-1.2.1.min.js')}}"></script>		
		<!-- iOS favicons. -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/admin/ico/apple-touch-icon-144-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/admin/ico/apple-touch-icon-114-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/admin/ico/apple-touch-icon-72-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/admin/ico/apple-touch-icon-57-precomposed.png') }}}">
		<!-- CSS -->
		<link href="{{{ asset('assets/admin/css/bootstrap.min.css') }}}" rel="stylesheet">
		<link href="{{{ asset('assets/admin/css/print.css') }}}" rel="stylesheet" type="text/css" media="print"/>
		<link rel="stylesheet" type="text/css" href="{{{ asset('assets/admin/css/jquery-ui-1.10.3.custom.css') }}}">		
		<link href="{{{ asset('assets/admin/css/style.min.css') }}}"rel="stylesheet" type="text/css" >
		<link href="{{{ asset('assets/admin/css/fineuploader/fineuploader.css') }}}" rel="stylesheet" type="text/css" >
		<link href="{{{ asset('assets/admin/css/colorbox.css') }}}" rel="stylesheet) }}}" type="text/css" >		
		<link href="{{{ asset('assets/admin/css/jquery.multiselect.css') }}}" rel="stylesheet" type="text/css" >		
		<link href="{{{ asset('assets/admin/css/style_modal.min.css') }}}" rel="stylesheet" type="text/css" >
		<link href="{{{ asset('assets/admin/css/jquery.tagit.css') }}}"  rel="stylesheet" type="text/css" >
		<link href="{{{ asset('assets/admin/css/select2.css') }}}"  rel="stylesheet" type="text/css" >		
		<link href="{{ asset('assets/admin/css/summernote.css')}}"  rel="stylesheet" type="text/css" >	
		<link href="{{ asset('assets/admin/css/summernote-bs3.css')}}"  rel="stylesheet" type="text/css" >				
		<link href="{{ asset('assets/admin/css/font-awesome.min.css')}}"  rel="stylesheet" type="text/css" >	
		<link href="{{ asset('assets/admin/css/prettify.css')}}"  rel="stylesheet" type="text/css" >	
		<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="{{{ asset('assets/admin/js/html5.js') }}}"></script>
		<script src="{{{ asset('assets/admin/js/respond.min.js') }}}"></script>
		<![endif]-->
		<!-- start: Favicon and Touch Icons -->
		<link rel="shortcut icon" href="{{{ asset('assets/admin/ico/favicon.ico') }}}">
		<!-- end: Favicon and Touch Icons -->
	</head>
	<body>
		<!-- Container -->
		<div class="container">
			<div class="page-header">
				<div class="pull-right">
					<button class="btn btn-link btn-small btn-inverse close_popup">
						<span class="icon-remove-sign"></span> {{{ Lang::get('admin/general.back') }}}
					</button>
				</div>
			</div>
			<!-- Content -->
			@yield('content')
			<!-- ./ content -->
		</div>
		<!-- ./ container -->
		<!-- start: JavaScript-->
		<!--[if !IE]>-->
		<script src="{{{ asset('assets/admin/js/jquery-2.0.3.min.js') }}}"></script>
		<!--<![endif]-->
		<!--[if IE]>
		<script src="{{{ asset('assets/admin/js/jquery-1.10.2.min.js') }}}"></script>
		<![endif]-->
		<script src="{{{ asset('assets/admin/js/jquery-migrate-1.2.1.min.js') }}}"></script>
		<script src="{{{ asset('assets/admin/js/bootstrap.min.js') }}}"></script>
		<!-- page scripts -->
		<script src="{{{ asset('assets/admin/js/jquery-ui-1.10.3.custom.min.js') }}}"></script>
		<script src="{{{ asset('assets/admin/js/jquery.ui.touch-punch.min.js') }}}"></script>
		<script src="{{{ asset('assets/admin/js/fineuploader/jquery.fineuploader-3.1.1.js') }}}"></script>
		<script src="{{{ asset('assets/admin/js/jquery.colorbox.js') }}}"></script>
		<script src="{{  asset('assets/admin/js/core.min.js')}}"></script>
		<script src="{{{ asset('assets/admin/js/jquery.multiselect.js') }}}"></script>
		<script src="{{{ asset('assets/admin/js/tag-it.js') }}}"></script>
		<script src="{{  asset('assets/admin/js/prettify.js')}}"></script>
		<script src="{{  asset('assets/admin/js/summernote.js')}}"></script>
		<script src="{{  asset('assets/admin/js/select2.js') }}"></script>
		<script type="text/javascript">
			$(function() {
				$('textarea').summernote({height: 250});
				$('form').submit(function(event) {
					var form = $(this);
					$.ajax({
						type : form.attr('method'),
						url : form.attr('action'),
						data : form.serialize(),
					}).complete(function() {
						// Optionally alert the user of success here...
						setTimeout(function() 
					        {
					            parent.$.colorbox.close();
					            window.parent.location.reload();
					        }, 10);
						
					}).fail(function() {
						// Optionally alert the user of an error here...
					});
					//event.preventDefault();
					// Prevent the form from submitting via the browser.
				});

				$('.close_popup').click(function() {
					parent.$.colorbox.close()
					window.parent.location.reload();
				});
				 $( "#sortable" ).sortable();
				$( "#sortable" ).disableSelection();
				$( "#finished" ).spinner({
						step: 0.01,
						numberFormat: "n"
					});
				$("select[id^='id'],select[id^='grid']").multiselect();
			});
		</script>
		@yield('scripts')
	</body>
</html>