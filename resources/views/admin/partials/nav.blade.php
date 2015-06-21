{{-- TODO: --}}
{{--<div class="input-group">--}}
{{--<input type="text" class="form-control" placeholder="Search...">--}}
{{--<span class="input-group-btn">--}}
{{--<button class="btn btn-default" type="button">--}}
{{--<i class="fa fa-search"></i>--}}
{{--</button>--}}
{{--</span>--}}
{{--</div>--}}

<div class="metismenu">
<ul class="nav nav-pills nav-stacked">
    <li class="{{set_active('admin/dashboard')}}">
        <a href="{{url('admin/dashboard')}}">
            <i class="fa fa-dashboard fa-fw"></i>
            <span class="hidden-sm text"> Dashboard</span>
        </a>
    </li>
    <li class="{{set_active('admin/language*')}}">
        <a href="{{url('admin/language')}}">
            <i class="fa fa-language"></i>
            <span class="hidden-sm text"> Language</span>
        </a>
    </li>
    <li class="{{set_active('admin/news*')}}">
        <a href="#">
            <i class="glyphicon glyphicon-bullhorn"></i> News items
            <span class="fa arrow"></span>
        </a>
        <ul class="nav collapse">
            <li class="{{set_active('admin/newscategory')}}">
                <a href="{{url('admin/newscategory')}}">
                    <i class="glyphicon glyphicon-list"></i>
                    <span class="hidden-sm text"> News categories</span>
                </a>
            </li>
            <li class="{{set_active('admin/news')}}">
                <a href="{{url('admin/news')}}">
                    <i class="glyphicon glyphicon-bullhorn"></i>
                    <span class="hidden-sm text"> News</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="{{set_active('admin/photo*')}}">
        <a href="#">
            <i class="glyphicon glyphicon-camera"></i> Photo items
            <span class="fa arrow"></span>
        </a>
        <ul class="nav collapse">
            <li class="{{set_active('admin/photoalbum')}}">
                <a href="{{url('admin/photoalbum')}}">
                    <i class="glyphicon glyphicon-list"></i>
                    <span class="hidden-sm text"> Photo albums</span>
                </a>
            </li>
            <li class="{{set_active('admin/photo')}}">
                <a href="{{url('admin/photo')}}">
                    <i class="glyphicon glyphicon-camera"></i>
                    <span class="hidden-sm text"> Photo</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="{{set_active('admin/video*')}}">
        <a href="#">
            <i class="glyphicon glyphicon-facetime-video"></i> Video items
            <span class="fa arrow"></span>
        </a>
        <ul class="nav collapse">
            <li class="{{set_active('admin/videoalbum')}}">
                <a href="{{url('admin/videoalbum')}}">
                    <i class="glyphicon glyphicon-list"></i>
                    <span class="hidden-sm text"> Video albums</span>
                </a>
            </li>
            <li class="{{set_active('admin/video')}}">
                <a href="{{url('admin/video')}}">
                    <i class="glyphicon glyphicon-facetime-video"></i>
                    <span class="hidden-sm text"> Video</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="{{set_active('admin/users*')}}">
        <a href="{{url('admin/users')}}">
            <i class="glyphicon glyphicon-user"></i>
            <span class="hidden-sm text"> Users</span>
        </a>
    </li>
</ul>
</div>