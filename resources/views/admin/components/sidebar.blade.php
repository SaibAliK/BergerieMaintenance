<div class="sidebar" data-color="green" data-background-color="black" data-image="{{ asset('admin_theme') }}/assets/img/sidebar-3.jpg">
    <div class="logo " style="">
        <a href="{{ route('admin.dashboard') }}" target="" class="ml-2">
            <img src="{{asset('/BERGERIE_LOGO.jpg')}}" width="40px" height="20px" class="small-logo ml-2" alt="logo" style="display:none"></a>
            <img src="{{asset('/BERGERIE_LOGO.jpg')}}" width="200px" height="70px" class="big-logo ml-4" alt="logo" ></a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="" />
                </div>
                <div class="user-info">
                    <a data-toggle="collapse" href="#collapseExample" class="username">
                        <span>{{auth()->user()->name ?? ""}} <b class="caret"></b></span>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.profile')}}">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.reset.passoword')}}">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal">Reset Passoword </span>
                            </a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item @routeis('admin.dashboard') active @endrouteis">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Dashboard </p>
                    </a>
                </li>

                <li class="nav-item @routeis('admin.internal_maint.*') active @endrouteis">
                    <a class="nav-link" data-toggle="collapse" href="#internal_maint">
                        <i class="material-icons">groups</i><p> Internal Maintenance<b class="caret"></b></p>
                    </a>
                    <div class="collapse @routeis('admin.internal_maint.*') show @endrouteis" id="internal_maint">
                        <ul class="nav">
                            <li class="nav-item @routeis('admin.internal_maint.list') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.internal_maint.list')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                    <span class="sidebar-normal"> List </span>
                                </a>
                            </li>
                            <li class="nav-item @routeis('admin.internal_maint.add') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.internal_maint.add')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                    <span class="sidebar-normal"> Add </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item @routeis('admin.external_maint.*') active @endrouteis">
                    <a class="nav-link" data-toggle="collapse" href="#external_maint">
                        <i class="material-icons">groups</i><p> External Maintenance<b class="caret"></b></p>
                    </a>
                    <div class="collapse @routeis('admin.external_maint.*') show @endrouteis" id="external_maint">
                        <ul class="nav">
                            <li class="nav-item @routeis('admin.external_maint.list') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.external_maint.list')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                    <span class="sidebar-normal"> List </span>
                                </a>
                            </li>
                            <li class="nav-item @routeis('admin.external_maint.add') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.external_maint.add')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                    <span class="sidebar-normal"> Add </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item @routeis('admin.unit.*') active @endrouteis">
                    <a class="nav-link" data-toggle="collapse" href="#unit">
                        <i class="material-icons">home</i><p> Units <b class="caret"></b></p>
                    </a>
                    <div class="collapse @routeis('admin.unit.*') show @endrouteis" id="unit">
                        <ul class="nav">
                            <li class="nav-item @routeis('admin.unit.list') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.unit.list')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                    <span class="sidebar-normal"> List </span>
                                </a>
                            </li>
                            <li class="nav-item @routeis('admin.unit.add') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.unit.add')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                    <span class="sidebar-normal"> Add </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item @routeis('admin.issues.*') active @endrouteis">
                    <a class="nav-link" data-toggle="collapse" href="#issues">
                        <i class="material-icons">bug_report</i><p> Issues <b class="caret"></b></p>
                    </a>
                    <div class="collapse @routeis('admin.issues.*') show @endrouteis" id="issues">
                        <ul class="nav">
                            <li class="nav-item @routeis('admin.issues.list') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.issues.list')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                    <span class="sidebar-normal"> List </span>
                                </a>
                            </li>
                            <li class="nav-item @routeis('admin.issues.add') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.issues.add')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                    <span class="sidebar-normal"> Add </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item @routeis('admin.staff.*') active @endrouteis">
                    <a class="nav-link" data-toggle="collapse" href="#staff">
                        <i class="material-icons">engineering</i><p> Staff <b class="caret"></b></p>
                    </a>
                    <div class="collapse @routeis('admin.staff.*') show @endrouteis" id="staff">
                        <ul class="nav">
                            <li class="nav-item @routeis('admin.staff.list') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.staff.list')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                    <span class="sidebar-normal"> List </span>
                                </a>
                            </li>
                            <li class="nav-item @routeis('admin.staff.add') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.staff.add')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                    <span class="sidebar-normal"> Add </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item @routeis('admin.logged_by.*') active @endrouteis">
                    <a class="nav-link" data-toggle="collapse" href="#logged_by">
                        <i class="material-icons">groups</i><p> Logged By <b class="caret"></b></p>
                    </a>
                    <div class="collapse @routeis('admin.logged_by.*') show @endrouteis" id="logged_by">
                        <ul class="nav">
                            <li class="nav-item @routeis('admin.logged_by.list') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.logged_by.list')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                    <span class="sidebar-normal"> List </span>
                                </a>
                            </li>
                            <li class="nav-item @routeis('admin.logged_by.add') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.logged_by.add')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                    <span class="sidebar-normal"> Add </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item @routeis('admin.job.*') active @endrouteis">
                    <a class="nav-link" data-toggle="collapse" href="#job">
                        <i class="material-icons">work</i><p> Jobs <b class="caret"></b></p>
                    </a>
                    <div class="collapse @routeis('admin.job.*') show @endrouteis" id="job">
                        <ul class="nav">
                            <li class="nav-item @routeis('admin.job.list') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.job.list')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">list</i></span>
                                    <span class="sidebar-normal"> Unassigned </span>
                                </a>
                            </li>
                            <li class="nav-item @routeis('admin.job.add') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.job.add')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                    <span class="sidebar-normal"> Add </span>
                                </a>
                            </li>
                            <li class="nav-item @routeis('admin.job.assigned') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.job.assigned')}}">
                                    <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                    <span class="sidebar-normal"> Assigned </span>
                                </a>
                            </li>
                            <li class="nav-item @routeis('admin.job.closed') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.job.closed')}}">
                                    <i class="material-icons">work_off</i>
                                    <p> Closed Jobs </p>
                                </a>
                            </li>
                            <li class="nav-item @routeis('admin.job.archive') active @endrouteis">
                                <a class="nav-link" href="{{route('admin.job.archive')}}">
                                    <i class="material-icons">archive</i>
                                    <p> Archived Jobs </p>
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