@if(Auth::check())
    <!-- ============================================================== -->
<!-- Topbar header -->
<!-- ============================================================== -->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- =========
        ===================================================== -->
    <div class="navbar-header">
        <a class="navbar-brand" href="/admin">

            <b>
            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
            <!-- Dark Logo icon -->
            <img src="/assets/backend/images/logo-icon.png" alt="homepage" class="dark-logo"/>
            <!-- Light Logo icon -->
            <img width="40px" height="40px" src="/assets/backend/images/logo-light-icon.png" alt="homepage"
                 class="light-logo"/>
        </b> <!--End Logo icon -->
        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="/assets/backend/images/logo-text.png" alt="homepage" class="dark-logo"/>
            <!-- Light Logo text -->
                         <img width="108px" height="25px" src="/assets/backend/images/logo-light-text.png" class="light-logo"
                              alt="homepage"/>
                </span> </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
<div class="navbar-collapse">


    <!-- ============================================================== -->
    <!-- Toggle  and nav items-->
    <!-- ============================================================== -->
<ul class="navbar-nav mr-auto">

    <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                            href="javascript:void(0)"><i class="ti-menu"></i></a></li>
    <li class="nav-item"><a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark"
                            href="javascript:void(0)"><i class="ti-menu"></i></a></li>
</ul>

    <!-- ============================================================== -->
    <!-- User profile and search -->
    <!-- ============================================================== -->
{{--<div id="showNotification">--}}

{{--</div>--}}

    <ul class="navbar-nav my-lg-0">

        <!-- ============================================================== -->
        <!-- Messages -->
        <!-- ============================================================== -->
        {{--<li class="nav-item dropdown" >--}}
            {{--<a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"--}}
               {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i--}}
                    {{--class="mdi mdi-email"></i>--}}
                {{--<div class="notify">--}}
                    {{--@if(count(Auth::user()->unreadNotifications))--}}
                        {{--<span class="heartbit"></span> <span class="point"></span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown"--}}
                 {{--aria-labelledby="2">--}}
                {{--<ul>--}}
                    {{--<li>--}}
                        {{--@if($newnotes = count(Auth::user()->unreadNotifications))--}}
                            {{--<div class="drop-title">لديك {{$newnotes}}--}}
                                {{--إشعارات جديدة--}}
                                {{--<br>--}}
                                {{--<a class="text-danger" markAllRead href="#"><small>تعليم الكل كمقروء</small></a>--}}
                            {{--</div>--}}
                        {{--@else--}}
                            {{--<div class="drop-title"> لا يوجد إشعارات جديدة</div>--}}

                        {{--@endif--}}
                    {{--</li>--}}

                        {{--<li >--}}
                            {{--<div class="message-center" id="showNotification2">--}}
                                {{--@foreach(Auth::user()->notifications as $note)--}}
                                    {{--<div class="row" id="MakeRead">--}}
                                    {{--<div class="col-sm-12">--}}
                                        {{--<a href="http://helal.test/admin/mission/{{$note->data['id']}}" notification class="{{ $note->read_at == null ? 'unread' : ''}}"--}}
                                           {{--data-noteid="{{ $note->id }}">--}}
                                            {{--<div class="mail-contnet">--}}
                                                {{--<h6 class="text-info">{{$note->data['data']}}</h6>--}}

                                                {{--<span--}}
                                                    {{--class="mail-desc"><span class="text-success">{{ $note->data['maker'] }}</span>--}}
                                                    {{--</span>--}}
                                                {{--<span--}}
                                                    {{--class="time">{{ $note->created_at->diffForHumans() }}</span>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                        {{--@if($note->read_at != null)--}}
                                        {{--<div class="col-sm-2" >--}}
                                        {{--<br>--}}
                                      {{--<a href="{{ action('Admin\NotificationController@destroy', $note) }}" style="padding: 0 0;!important; border-bottom: 0;!important; " data-toggle="tooltip"--}}
                                            {{--data-original-title="حذف الإشعار"> <i--}}
                                              {{--class="fa fa-times-circle text-inverse m-r-10"></i> </a>--}}
                                        {{--</div>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}


                                {{--@endforeach--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--<li>--}}
                        {{--<a class="nav-link text-center" href="{{ action('Admin\NotificationController@index') }}"> <strong> جميع--}}
                                {{--الإشعارات</strong> <i class="fa fa-angle-left"></i> </a>--}}
                    {{--</li>--}}
                    {{--@if(count(Auth::user()->notifications))--}}
                    {{--<li>--}}
                        {{--<a class="nav-link text-center" href="{{ action('Admin\NotificationController@destroyAll') }}"> <strong>حذف جميع الإشعارات</strong>  </a>--}}
                    {{--</li>--}}
                        {{--@endif--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</li>--}}
        <!-- ============================================================== -->
        <!-- End Messages -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Profile -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><img src="{{ url('/storage/') . Auth::user()->image_path }}" alt="user"
                                                               class="profile-pic"/></a>
            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                <ul class="dropdown-user">
                    <li>
                        <div class="dw-user-box">
                            <div class="u-img"><img src="{{ url('/storage/') . Auth::user()->image_path }}" alt="user"></div>
                            <div class="u-text">
                                <h4>{{ Auth::user()->name}}</h4>
                                <p class="text-muted">{{ Auth::user()->email}}</p>
                                {{--<h4><span class="label label-{{ Auth::user()->role == 1 ? 'success' :( Auth::user()->role==2 ? 'warning' : (  Auth::user()->role == 3 ? 'info' : ( Auth::user()->role == 4 ? 'primary' : 'danger')))}}">{{  Auth::user()->role == 1 ? 'مدير عام' : ( Auth::user()->role == 2 ? 'مدير عمليات' : ( Auth::user()->role == 3 ? 'مدير مباشر' : ( Auth::user()->role == 4 ? 'منسق' : 'مشرف السائقين' ) ) ) }}</span></h4>--}}

                            </div>
                        </div>
                    </li>

                            <li>
                            <a data-logout href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a>
                            <form action="/logout" method="post">
                                {{ csrf_field() }}
                            </form>
                      </li>
                   </ul>
                </div>
           </li>

       </ul>

    </div>

</nav>



</header><!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
@endif
