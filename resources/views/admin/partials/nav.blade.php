<div class="input-group">
    <input type="text" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">
            <i class="fa fa-search"></i>
        </button>
      </span>
</div>


<ul class="nav nav-pills nav-stacked" id="menu">
    <li {{ (Request::is('admin/dashboard') ? ' class=active' : '') }}>
        <a href="{{URL::to('admin/dashboard')}}"
                >
            <i class="fa fa-dashboard fa-fw"></i><span class="hidden-sm text">
Dashboard</span>
        </a>
    </li>
    <li {{ (Request::is('admin/language*') ? ' class=active' : '') }}>
        <a href="{{URL::to('admin/language')}}"
                >
            <i class="glyphicon glyphicon-flag"></i><span
                    class="hidden-sm text"> Language</span>
        </a>
    </li>
    <li {{ (Request::is('admin/news*') ? ' class=active' : '') }}>
        <a href="#">
            <i class="glyphicon glyphicon-bullhorn"></i> News items<span
                    class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse">
            <li {{ (Request::is('admin/newscategory') ? ' class=active' : '') }} >
                <a href="{{URL::to('admin/newscategory')}}">
                    <i class="glyphicon glyphicon-list"></i><span
                            class="hidden-sm text"> News categories </span>
                </a>
            </li>
            <li {{ (Request::is('admin/news') ? ' class=active' : '') }} >
                <a href="{{URL::to('admin/news')}}">
                    <i class="glyphicon glyphicon-bullhorn"></i><span
                            class="hidden-sm text"> News</span>
                </a>
            </li>
        </ul>
    </li>
    <li {{ (Request::is('admin/photo*') ? ' class=active' : '') }}>
        <a href="#">
            <i class="glyphicon glyphicon-camera"></i> Photo items<span
                    class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" id="collapseTwo">
            <li  {{ (Request::is('admin/photoalbum') ? ' class=active' : '') }} >
                <a href="{{URL::to('admin/photoalbum')}}">
                    <i class="glyphicon glyphicon-list"></i><span
                            class="hidden-sm text"> Photo albums</span>
                </a>
            </li>
            <li {{ (Request::is('admin/photo') ? ' class=active' : '') }}>
                <a href="{{URL::to('admin/photo')}}"
                        >
                    <i class="glyphicon glyphicon-camera"></i><span
                            class="hidden-sm text"> Photo</span>
                </a>
            </li>
        </ul>
    </li>
    <li {{ (Request::is('admin/video*') ? ' class=active' : '') }}>
        <a href="#">
            <i class="glyphicon glyphicon-facetime-video"></i> Video
            items<span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" id="collapseThree">
            <li {{ (Request::is('admin/videoalbum') ? ' class=active' : '') }}>
                <a href="{{URL::to('admin/videoalbum')}}"
                        >
                    <i class="glyphicon glyphicon-list"></i><span
                            class="hidden-sm text"> Video albums</span>
                </a>
            </li>
            <li  {{ (Request::is('admin/video') ? ' class=active' : '') }}>
                <a href="{{URL::to('admin/video')}}"
                        >
                    <i class="glyphicon glyphicon-facetime-video"></i><span
                            class="hidden-sm text"> Video</span>
                </a>
            </li>
        </ul>
    </li>
    <li {{ (Request::is('admin/users*') ? ' class=active' : '') }} >
        <a href="{{URL::to('admin/users')}}"
                >
            <i class="glyphicon glyphicon-user"></i><span
                    class="hidden-sm text"> Users</span>
        </a>
    </li>
</ul>
