<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Sath.dev</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic users Theme #1 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <link rel="icon" type="image/png" href="{{url('frontend/assets')}}/images/new-favicon.png">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{url('')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{url('')}}/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{url('')}}/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{url('')}}/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{url('')}}/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <script src="{{url('')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script>

        @yield('header_scripts')

        <style>
            .page-content-wrapper,.page-footer,.page-header,.page-sidebar-menu,.page-sidebar .sidebar-search .input-group .form-control,
            .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .sidebar-search .input-group .form-control,.page-header {
                background-color: #000043!important;
            }
            @media(min-width: 1199px)
            {
                .payment-last-input
                {
                    margin-bottom: 123px;
                }
            }
        </style>
        <link rel="stylesheet" href="{{url('')}}/css/userCustom.css" type="text/css">
        </head>
    <!-- END HEAD -->
        
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
        <div class="page-wrapper">
            @include('users.layout.header')
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                @include('users.layout.navbar')
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            @yield('breadcrumbs')
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        @yield('title')
                        @if(Session::has('success'))
                            <div id="prefix_278372338547" class="custom-alerts alert alert-warning fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <i class="fa-lg fa fa-fa fa-warning"></i>  {{Session::get('success')}}.</div>
                        @endif

                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        @yield('content')
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                
            </div>
            <!-- END CONTAINER -->
        </div>
        <!-- BEGIN QUICK NAV -->
        
        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        @include('users.layout.footer')
        
        @yield('footer_scripts')
    </body>

</html>