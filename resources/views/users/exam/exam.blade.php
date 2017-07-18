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
            <a href="{{url('/home')}}">Exam Question</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
@endsection

@section('title')
    <h1 class="page-title"> Exam Question
        <small>Recent Exam</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i><strong>Exam:</strong> {{$exam->name}}, <span style="font-size: 15px;"><strong>Subject:</strong> {{$exam->subject}}</span></div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body form" style="min-height: 500px;">
                <!-- BEGIN FORM-->
                <form method="POST" id="users_add" action="{{route('judge-exam')}}" class="form-horizontal">
                    {{csrf_field()}}
                    <?php $i=1;?>
                    <div class="form-body">
                        @foreach($questions as $quesion)
                            <div class="form-group" style="background-color: rgba(0,0,0,.6);padding: 25px 0px;color: #ffffff;">

                                <div class="col-xs-10 col-xs-offset-1">
                                    <p style="font-size: 18px;font-weight: bold;">{{$i}}. {{ $quesion->question }}</p>
                                </div>
                                <div class="col-xs-10 col-xs-offset-1" style="margin-top: -10px;">
                                    @foreach($quesion->option($quesion->id) as $option)
                                        <div class="radio" style="margin-left: 10px;">
                                            <label>
                                                <input type="radio" name="ans{{$i}}" value="{{$option->option}}" style="font-size: 14px;">
                                                {{$option->option}}
                                            </label>
                                            <input type="hidden" name="ques{{$i}}" value="{{$quesion->id}}">
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <?php $i++; ?>
                        @endforeach
                    </div>
                    <div class="form-actions fluid">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
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