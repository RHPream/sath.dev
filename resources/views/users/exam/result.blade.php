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
            <a href="{{url('/home')}}">Exam Result</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
@endsection

@section('title')
    <h1 class="page-title"> Exam Result
        <small>Recent Result</small>
    </h1>
@endsection

@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Exam Result</div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body form" style="min-height: 500px;">
            <!-- BEGIN FORM-->
            <div class="row">
                <div class="col-md-5">
                    <h3 class="text-center">Correct Answer</h3>
                    <table class="table table-inverse table-bordered table-hover" style="background-color: rgba(0,0,0,.6);color: #ffffff;">
                        <thead style="background-color: green;">
                        <tr>
                            <th> # </th>
                            <th> Question </th>
                            <th> Answer </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($corrects as $c)
                            <tr>
                                <td> {{$i++}}</td>
                                <td> {{$c['question']}}</td>
                                <td> {{$c['answer']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-7">
                    <h3 class="text-center">Wrong Answer</h3>
                    <table class="table table-inverse table-bordered table-hover" style="background-color: rgba(0,0,0,.6);padding: 10px;color: #ffffff;">
                        <thead style="background-color: red;">
                        <tr>
                            <th> # </th>
                            <th> Question </th>
                            <th> Answer </th>
                            <th> Your Answer </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($wrongs as $c)
                            <tr>
                                <td> {{$i++}}</td>
                                <td> {{$c['question']}}</td>
                                <td> {{$c['answer']}}</td>
                                <td> {{$c['your_answer']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-xs-12" style="background-color: rgba(5, 113, 109, 0.81);margin-top: 30px;padding: 15px;margin-bottom: 40px;">
                <h1 class="text-center" style="font-weight: bold;color: #EED04A;">Marks Obtained and Comments</h1>
                <h3 class="text-center"><strong style="color: #71f442;">Marks:</strong> <small style="color: #cdf441;">{{$res}}</small></h3>
                <h3 class="text-center"><strong style="color: #71f442;">Position:</strong> <small style="color: #cdf441;">{{$position}}</small></h3>
                <h3 class="text-center"><strong style="color: #71f442;">Comment:</strong> <small style="color: #cdf441;">{{$comment}}</small></h3>

            </div>
            <p style="clear: both;"></p>

            <!-- END FORM-->
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
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