@extends('admin.layout.master')

@section('header_scripts')
    <script src="{{url('tinymce')}}/tinymce.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" />
    <link href="{{url('')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
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
                    <h3 class="text-center">Footer</h3>

                    <div class="form-group mt-repeater no-extra-space">
                        <div data-repeater-list="dropdown">
                            <div data-repeater-item class="mt-repeater-item">
                                <div class="mt-repeater-row">

                                    <div class="col-md-10 col-md-offset-1">
                                        <h4>Dropdown</h4>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Dropdown Name</label>
                                        <div class="col-md-9">
                                            <select name="drop_id" class="form-control">
                                                <option value="0">Please select</option>
                                                <option value="First dropdown">First dropdown</option>
                                                <option value="Second dropdown">Second dropdown</option>
                                                <option value="Third dropdown">Third dropdown</option>
                                                <option value="Fourth dropdow">Fourth dropdown</option>
                                                <option value="Nested dropdown">Nested dropdown</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Parent Name</label>
                                        <div class="col-md-9">
                                            <p class="help-block">No necessary if not sub dropdown menu</p>
                                            <select name="parent_id" class="form-control">
                                                <option value="0">Please select</option>
                                                <option value="First dropdown">First dropdown</option>
                                                <option value="Second dropdown">Second dropdown</option>
                                                <option value="Third dropdown">Third dropdown</option>
                                                <option value="Fourth dropdow">Fourth dropdown</option>
                                                {{--<option value="5">Nested dropdown</option>--}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Menu name</label>
                                        <div class="col-md-9">
                                            <input type="text" name="dname" class="form-control" placeholder="Enter Menu Name" value="{{old('dname')?old('dname'):''}}">
                                        </div>
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
                                <i class="fa fa-plus"></i> Add Dropdown</a></div>
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
