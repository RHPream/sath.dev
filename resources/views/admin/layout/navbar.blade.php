<div class="page-sidebar-wrapper">

    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="sidebar-search-wrapper">
                <form class="sidebar-search  " action="#" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="nav-item start active open">
            	<a href="{{url('admin')}}" class="nav-link ">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="badge badge-success"></span>
                </a>                                
            </li>
            <li class="heading">
                <h3 class="uppercase">Features</h3>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Pages</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{url('admin/home-page')}}" class="nav-link ">
                            <i class="icon-layers"></i>
                            <span class="title">Home Page</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('admin/services/1/edit')}}" class="nav-link ">
                            <i class="icon-layers"></i>
                            <span class="title">Services Page</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">University &amp; Circular</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{url('admin/university')}}" class="nav-link ">
                            <i class="icon-layers"></i>
                            <span class="title">University</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('admin/circular')}}" class="nav-link ">
                            <i class="icon-layers"></i>
                            <span class="title">Circular</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">Users</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{url('admin/users')}}" class="nav-link ">
                            <span class="title">Users List</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="{{url('admin/payment')}}" class="nav-link ">
                    <i class="icon-layers"></i>
                    <span class="title">Payment</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{url('admin/exams')}}" class="nav-link ">
                    <i class="icon-layers"></i>
                    <span class="title">Exams</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{url('admin/routine')}}" class="nav-link ">
                    <i class="icon-layers"></i>
                    <span class="title">Routine</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{url('admin/message')}}" class="nav-link ">
                    <i class="icon-layers"></i>
                    <span class="title">Message</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{url('admin/subject')}}" class="nav-link ">
                    <i class="icon-layers"></i>
                    <span class="title">Subjects</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{url('admin/lecture')}}" class="nav-link ">
                    <i class="icon-layers"></i>
                    <span class="title">Lectures</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{url('admin/chapter')}}" class="nav-link ">
                    <i class="icon-layers"></i>
                    <span class="title">Chapters</span>
                </a>
            </li>

            
            {{--<li class="nav-item  ">--}}
                {{--<a href="{{url('admin/contact')}}" class="nav-link ">--}}
                    {{--<i class="icon-envelope"></i>--}}
                    {{--<span class="title">Contact Us</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li class="nav-item  ">--}}
                {{--<a href="{{url('admin/settings')}}" class="nav-link ">--}}
                    {{--<i class="icon-settings"></i>--}}
                    {{--<span class="title">Settings</span>--}}
                {{--</a>--}}
            {{--</li>--}}
        </ul>
        <!-- END SIDEBAR MENU -->
        
    </div>
    <!-- END SIDEBAR -->
</div>