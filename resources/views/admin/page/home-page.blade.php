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
            <a href="{{url('')}}/admin/users">Edit Homepage</a>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="form-actions">
            <div class="btn-set pull-left">

            </div>
        </div>
    </div>
@endsection

@section('title')
    <h1 class="page-title"> Edit Homepage
        <small>Recent Edit Homepage</small>
    </h1>
@endsection

@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Edit Homepage </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form method="POST" id="users_add" action="{{route('home-page.store')}}" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Slider Video</label>
                        <div class="col-md-9">
                            <input type="text" name="slider_video" class="form-control" placeholder="Enter iFrame" value="{{old('slider_video')?old('slider_video'):$home->video}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">CEO Image</label>
                        <div class="col-md-9">
                            <input type="file" name="ceo_image" class="form-control" value="{{old('ceo_image')?old('ceo_image'):$sidebar->ceo_image}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">CEO Description</label>
                        <div class="col-md-9">
                            <p class="help-block">HTML Tag using is legal.</p>
                            <textarea name="ceo_description" class="form-control" placeholder="Enter message" id="description" cols="30" rows="10">{{old('ceo_description')?old('ceo_description'):$sidebar->ceo_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Sidebar Video</label>
                        <div class="col-md-9">
                            <input type="text" name="sidebar_video" class="form-control" placeholder="Enter iFrame" value="{{old('slider_video')?old('sidebar_video'):$sidebar->side_video}}">
                        </div>
                    </div>
                </div>
                <div class="form-actions fluid">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-9">
                            <button type="submit" class="btn green">Submit</button>
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
