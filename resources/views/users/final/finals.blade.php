@extends('users.layout.master')

@section('header_scripts')
    <script src="{{url('tinymce')}}/tinymce.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" />
    <link href="{{url('')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('/home')}}">Final Exams</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
@endsection

@section('title')
    <h1 class="page-title"> Final Exams
        <small>Recent Final Exams</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>All Final Exam of your class. </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body form" style="min-height: 500px;">
                <!-- BEGIN FORM-->

                @foreach($exams as $l)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin: 10px;">
                        <a class="dashboard-stat dashboard-stat-v2 yellow"  href="{{url('').'/exam-question/'.$l->slug.'/'.$l->owns}}">
                            <div class="visual">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="details">
                                <div class="number"></div>
                                <div class="desc"> {{$l->name}} </div>
{{--                            <div class="desc" style="font-size: 15px;">{{$l->year->university}} </div>--}}
                            </div>
                        </a>
                    </div>
            @endforeach

            <!-- END FORM-->
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>

@endsection

@section('footer_scripts')
    <script src="{{url('')}}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>
    <script src="{{url('')}}/js/scripts/indicator-repeater.js" type="text/javascript"></script>
    <script src="{{url('')}}/js/validation/indicator-validation.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(window).load(function () {
            alert('You will be charged 1,000.00 Tk per exam. Please keep that balance.');
//            swal({
//                title: "You will be charged 1,000.00 Tk per exam?",
//                text: "Do you want to continue ?",
//                type: "info",
//                showCancelButton: true,
//                closeOnConfirm: false,
//                showLoaderOnConfirm: true
//            });
        });
    </script>
@endsection