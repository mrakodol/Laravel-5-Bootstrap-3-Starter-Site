<!DOCTYPE html>

<html lang="en">

	<head id="Starter-Site">

		<meta charset="UTF-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title> Administration :: @yield('title')</title>

		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<meta name="description" content="" />
		<meta name="google-site-verification" content="">
		<meta name="DC.title" content="Laravel 5 Starter Site">
		<meta name="DC.subject" content="">
		<meta name="DC.creator" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/plugins/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/sb-admin-2.css')}}" rel="stylesheet">

        <link href="{{asset('assets/admin/css/jquery.dataTables.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/dataTables.bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/colorbox.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/font-awesome-4.2.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="{{{ asset('assets/admin/ico/favicon.ico') }}}">

	</head>
	<body>
	<div id="wrapper">
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{!!URL::to('/admin')!!}">Administration</a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
					    <li class="dropdown">
							<a class="btn account dropdown-toggle" data-toggle="dropdown" href="#">
							<div class="user">
								<span class="hello"> {{ Lang::get('admin/admin.welcome') }}!</span>
								<span class="name"> {{{ Auth::user()->name }}}</span>
							</div> </a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{{ URL::to('/') }}}"><i class="glyphicon glyphicon-home"></i> {{ Lang::get('admin/admin.homepage') }}</a>
								</li>
								<li>
									<a href="{{{ URL::to('auth/logout') }}}"><i class="glyphicon glyphicon-off"></i> {{ Lang::get('site/site.logout') }}</a>
								</li>
							</ul>
						</li>
					</ul>
		 <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                <li class="sidebar-search">
                                    <div class="input-group custom-search-form">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                         </span>
                                    </div>
                                </li>
                                <li >
                                    <a href="{{URL::to('admin/')}}" {{ (Request::is('admin/') ? ' class=active' : '') }}>
                                    <i class="fa fa-dashboard fa-fw"></i><span class="hidden-sm text"> Dashboard</span></a>
                                </li>
                                <li>
                                    <a href="{{URL::to('admin/language')}}" {{ (Request::is('admin/language*') ? ' class=active' : '') }}>
                                    <i class="glyphicon glyphicon-flag"></i><span class="hidden-sm text"> Language</span></a>
                                </li>
                                 <li {{ (Request::is('admin/news*') ? ' class=active' : '') }}><a href="#"><i class="glyphicon glyphicon-bullhorn"></i> News items<span class="fa arrow"></span></a>
	                                 <ul class="nav nav-second-level">
		                                <li>
		                                    <a href="{{URL::to('admin/newscategory')}}" {{ (Request::is('admin/newscategory') ? ' class=active' : '') }}>
		                                    <i class="glyphicon glyphicon-list"></i><span class="hidden-sm text"> News categories </span></a>
		                                </li>
		                                 <li>
		                                    <a href="{{URL::to('admin/news')}}" {{ (Request::is('admin/news') ? ' class=active' : '') }}>
		                                    <i class="glyphicon glyphicon-bullhorn"></i><span class="hidden-sm text"> News</span></a>
		                                </li>
	                                </ul>
                                </li>
                                <li{{ (Request::is('admin/photo*') ? ' class=active' : '') }}><a href="#"><i class="glyphicon glyphicon-camera"></i> Photo items<span class="fa arrow"></span></a>
	                                 <ul class="nav nav-second-level">
		                                <li>
		                                    <a href="{{URL::to('admin/photoalbum')}}" {{ (Request::is('admin/photoalbum') ? ' class=active' : '') }}>
		                                    <i class="glyphicon glyphicon-list"></i><span class="hidden-sm text"> Photo albums</span></a>
		                                </li>
		                                <li>
		                                    <a href="{{URL::to('admin/photo')}}" {{ (Request::is('admin/photo') ? ' class=active' : '') }}>
		                                    <i class="glyphicon glyphicon-camera"></i><span class="hidden-sm text"> Photo</span></a>
		                                </li>
		                          	</ul>
                                </li>
                                 <li {{ (Request::is('admin/video*') ? ' class=active' : '') }}><a href="#"><i class="glyphicon glyphicon-facetime-video"></i> Video items<span class="fa arrow"></span></a>
	                                 <ul class="nav nav-second-level">
		                                <li>
		                                    <a href="{{URL::to('admin/videoalbum')}}" {{ (Request::is('admin/videoalbum') ? ' class=active' : '') }}>
		                                    <i class="glyphicon glyphicon-list"></i><span class="hidden-sm text"> Video albums</span></a>
		                                </li>
		                                <li>
		                                    <a href="{{URL::to('admin/video')}}" {{ (Request::is('admin/video') ? ' class=active' : '') }}>
		                                    <i class="glyphicon glyphicon-facetime-video"></i><span class="hidden-sm text"> Video</span></a>
		                                </li>
		                             </ul>
                                </li>
                                <li>
                                    <a href="{{URL::to('admin/users')}}" {{ (Request::is('admin/users*') ? ' class=active' : '') }}>
                                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm text"> Users</span></a>
                                </li>
                                <li>
                                    <a href="{{URL::to('admin/roles')}}" {{ (Request::is('admin/roles*') ? ' class=active' : '') }}>
                                    <i class="glyphicon glyphicon-tasks"></i><span class="hidden-sm text"> Roles</span></a>
                                </li>
                		    </ul>
                	    </div>
                    </div>
			    </nav>
		</header>
                    <div id="page-wrapper">
                        <div class="row">
								@yield('content')
						</div>
            </div>
        </div>
		<div class="clearfix"></div>
		<footer>
			<p>
				<span style="text-align:left;float:left">&copy; 2014 <a href="#">Laravel 5 Starter Site</a></span>
				<span class="hidden-phone" style="text-align:right;float:right">Powered by: <a href="http://laravel.com/" alt="Laravel 5.0">Laravel 5.0</a></span>
			</p>

		</footer>
        <!--[if !IE]>-->
        <script src="{{asset('assets/admin/js/jquery-2.1.1.min.js')}}"></script>
        <!--<![endif]-->
        <!--[if IE]>
        <script src="{{asset('assets/admin/js/jquery-1.11.1.min.js')}}"></script>
        <![endif]-->
        <script src="{{asset('assets/admin/js/jquery-migrate-1.2.1.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery-ui.1.11.2.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/plugins/metisMenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/sb-admin-2.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/dataTables.bootstrap.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap-dataTables-paging.js')}}"></script>
        <script src="{{asset('assets/admin/js/datatables.fnReloadAjax.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.colorbox.js')}}"></script>
        <script src="{{asset('assets/admin/js/modal.js')}}"></script>

		@yield('scripts')
	</body>
</html>
