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
            <a href="{{url('/home')}}">Lectures</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
@endsection

@section('title')
    <h1 class="page-title"> Lectures
        <small>Recent Lectures</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>All Lecture of your class. </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body form" style="min-height: 500px;">
                <!-- BEGIN FORM-->

                    @foreach($lectures as $l)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin: 10px;">
                            <a class="dashboard-stat dashboard-stat-v2 purple"  data-toggle="modal" data-target="#myModal{{$l->id}}">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number"></div>
                                    <div class="desc"> {{$l->name}} </div>
                                    <div class="desc" style="font-size: 20px;"> {{$l->subject->name}} </div>
                                </div>
                            </a>
                        </div>

                        <div class="modal fade" id="myModal{{$l->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Exam Type</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <a href="{{url('exam-question').'/'.$l->slug.'/1'}}" class="btn btn-success btn-block">Our Suggestion</a>
                                            </div>
                                            <div class="col-xs-6">
                                                <a href="{{url('exam-question').'/'.$l->slug.'/0'}}" class="btn btn-warning btn-block">Public Suggestion</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
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
@endsection