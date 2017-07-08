@extends('admin.layout.master')

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
            <a href="#">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{url('')}}/admin/indicators">Exam</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Add Product</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="form-actions">
            <div class="btn-set pull-left">
                <a href="{{url('admin/exams')}}" class="btn btn-primary">Exam List</a>
            </div>
        </div>
    </div>
@endsection

@section('title')
    <h1 class="page-title"> Exam
        <small>Recent Add Question</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Add Question </div>
                </div>
                <div class="portlet light bordered" id="form_wizard_1">
                    <div class="portlet-body form">
                        <form class="form-horizontal" action="{{url('admin/add-question').'/'.$exam->id}}" id="submit_form" method="POST">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="form-wizard">
                                <div class="form-body">
                                    <h3 class="block text-center"><strong>{{$exam->name}}</strong></h3>
                                    <h4 class="block text-center">Category: <strong>{{$exam->category($exam->id)->name}}</strong> Subject: <strong>{{$exam->subject}}</strong></h4>

                                    <div class="form-group mt-repeater no-extra-space">
                                        <div data-repeater-list="ques">
                                            <div data-repeater-item class="mt-repeater-item">
                                                <div class="mt-repeater-row">
                                                    <div class="col-md126 col-md-9 col-md-offset-1">
                                                        <label class="control-label">Question</label>
                                                        <p class="help-block" style="font-size:12px;">Question is required</p>
                                                        <input name="question" type="text" placeholder="Question" class="form-control" />
                                                    </div>
                                                    <div class="col-md-9 col-md-offset-1">
                                                        <label class="control-label">Answer</label>
                                                        <p class="help-block" style="font-size:12px;">Answer need to add in option for random and unique type.</p>
                                                        <input type="text" name="answer" placeholder="Answer" class="form-control">
                                                    </div>
                                                    <div class="col-md-9 col-md-offset-1">
                                                        <label class="control-label">Possible Option</label>
                                                        <p class="help-block" style="font-size:12px;">All field are not required</p>
                                                        <input type="text" name="option1" placeholder="Possible Answer 1" class="form-control" style="margin-bottom: 10px;">
                                                        <input type="text" name="option2" placeholder="Possible Answer 2" class="form-control" style="margin-bottom: 10px;">
                                                        <input type="text" name="option3" placeholder="Possible Answer 3" class="form-control" style="margin-bottom: 10px;">
                                                        <input type="text" name="option4" placeholder="Possible Answer 4" class="form-control" style="margin-bottom: 10px;">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                                            <i class="fa fa-close"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add">
                                                <i class="fa fa-plus"></i> Add Question</a></div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-9">
                                    <input type="submit" class="btn btn-success" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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