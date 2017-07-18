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
            	<a href="{{url('/home')}}" class="nav-link ">
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
                    <i class="icon-user"></i>
                    <span class="title">Question set</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{url('lecture-wise-exams')}}" class="nav-link ">
                            <span class="title">Lecture wise</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('subject-wise-exams')}}" class="nav-link ">
                            <span class="title">Subject wise</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('year-wise-exams')}}" class="nav-link ">
                            <span class="title">Year wise</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('final-exams')}}" class="nav-link ">
                            <span class="title">Final Exam</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="{{url('admin/chapter')}}" class="nav-link ">
                    <i class="icon-layers"></i>
                    <span class="title">Previous question</span>
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