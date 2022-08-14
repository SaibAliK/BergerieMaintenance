<div class="sidebar" data-color="green" data-background-color="black" data-image="{{ asset('admin_theme') }}/assets/img/sidebar-3.jpg">
    <div class="logo " style="">
        <a href="{{ route('admin.dashboard') }}" target="" class="ml-2">
            <a href="{{ route('admin.dashboard') }}" target="" class="ml-2">
            <img src="{{asset('/BERGERIE_LOGO.jpg')}}" width="40px" height="20px" class="small-logo ml-2" alt="logo" style="display:none"></a>
            <img src="{{asset('/BERGERIE_LOGO.jpg')}}" width="200px" height="70px" class="big-logo ml-4" alt="logo" ></a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                </div>
                <div class="user-info">
                    <a  class="username">
                        <span>Internal Maintenance</span>
                    </a>
                    {{--<div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="sidebar-mini"> EP </span>
                                    <span class="sidebar-normal"> Edit Profile </span>
                                </a>
                            </li>
                        </ul>
                    </div>--}}
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item @routeis('staff.dashboard') active @endrouteis">
                    <a class="nav-link" href="{{ route('internal.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item @routeis('internal.job.*') active @endrouteis">
                    <a class="nav-link" data-toggle="collapse" href="#job">
                        <i class="material-icons">work</i><p> Jobs <b class="caret"></b></p>
                    </a>
                    <div class="collapse @routeis('internal.job.*') show @endrouteis" id="job">
                        <ul class="nav">
                            <li class="nav-item @routeis('internal.job.list') active @endrouteis">
                                <a class="nav-link" href="{{route('internal.job.list')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                    <span class="sidebar-normal"> Assigned Job </span>
                                </a>
                            </li>
                            {{--<li class="nav-item @routeis('internal.job.closed') active @endrouteis">
                                <a class="nav-link" href="{{route('internal.job.closed')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                    <span class="sidebar-normal"> Closed Job </span>
                                </a>
                            </li>--}}
                            <li class="nav-item @routeis('internal.job.hold') active @endrouteis">
                                <a class="nav-link" href="{{route('internal.job.hold')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                    <span class="sidebar-normal"> Hold Job </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:;" onclick="document.getElementById('logout-form').submit()">
                        <form id="logout-form" class="d-none" method="post" action="{{ route('logout') }}">@csrf</form>
                        <i class="material-icons">logout</i>
                        <p> Logout </p>
                    </a>
                </li>
            </ul>
        </div>
    </div>