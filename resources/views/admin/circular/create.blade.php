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
            <a href="{{url('')}}/admin/users">Circulars</a>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="form-actions">
            <div class="btn-set pull-left">
                <a href="{{url('admin/circular')}}" class="btn btn-primary">Circulars</a>
            </div>
        </div>
    </div>
@endsection

@section('title')
    <h1 class="page-title"> Circulars
        <small>Recent Add Circulars</small>
    </h1>
@endsection

@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Add Circulars </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form method="POST" id="users_add" action="{{route('circular.store')}}" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-1 control-label">Subject</label>
                        <div class="col-md-9">
                            <select name="university" class="form-control">
                                <option value="">Select a University</option>
                                @foreach($universities as $university)
                                    <option value="{{$university->id}}">{{$university->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Unit</label>
                        <div class="col-md-9">
                            <input type="text" name="unit" class="form-control" placeholder="Enter unit" value="{{old('unit')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Type</label>
                        <div class="col-md-9">
                            <select name="type" class="form-control">
                                <option value="">Select a Type</option>
                                <option value="Arts">Arts</option>
                                <option value="Commerce">Commerce</option>
                                <option value="Science">Science</option>
                                <option value="Common">Common</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">File</label>
                        <div class="col-md-9">
                            <input type="file" name="file" class="form-control" placeholder="Choose file" value="{{old('file')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Description</label>
                        <div class="col-md-9">
                            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{old('description')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">News</label>
                        <div class="col-md-9">
                            <input type="text" name="marque" class="form-control" placeholder="Enter news" value="{{old('marque')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Link</label>
                        <div class="col-md-9">
                            <input type="text" name="link" class="form-control" placeholder="Enter link" value="{{old('link')}}">
                        </div>
                    </div>

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
