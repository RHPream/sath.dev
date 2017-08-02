@extends('admin.layout.master')

@section('header_scripts')
    <link href="{{url('')}}/assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <ul class="page-breadcrumb">
        <li>
            <a href="#">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{url('')}}/admin/users">routines</a>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="form-actions">
            <div class="btn-set pull-left">
                <a href="{{url('admin/routine')}}" class="btn btn-primary">routines</a>
            </div>
        </div>
    </div>
@endsection

@section('title')
    <h1 class="page-title"> routines
        <small>Recent Edit routines</small>
    </h1>
@endsection

@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Edit routines </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form method="POST" id="users_add" action="{{route('routine.update',$routine->id)}}" class="form-horizontal">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-body">
                    <input type="hidden" name="class_id" value="{{$routine->class_id}}">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-1 control-label">Day 1</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="one" value="{{$routine->one}}" placeholder="Please enter routine">
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-1 control-label">Day 2</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="two" value="{{$routine->two}}" placeholder="Please enter routine">
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-1 control-label">Day 3</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="three" value="{{$routine->three}}" placeholder="Please enter routine">
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-1 control-label">Day 4</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="four" value="{{$routine->four}}" placeholder="Please enter routine">
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-1 control-label">Day 5</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="five" value="{{$routine->five}}" placeholder="Please enter routine">
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-1 control-label">Day 6</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="six" value="{{$routine->six}}" placeholder="Please enter routine">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions fluid">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-9">
                            <button type="submit" class="btn green">Update</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
@endsection

@section('footer_scripts')
    <script src="{{url('')}}/assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/autosize/autosize.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/pages/scripts/components-form-tools.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/js/validation/users-validation.js" type="text/javascript"></script>
@endsection
