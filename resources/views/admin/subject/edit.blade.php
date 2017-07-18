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
            <a href="{{url('')}}/admin/users">Subjects</a>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="form-actions">
            <div class="btn-set pull-left">
                <a href="{{url('admin/subject')}}" class="btn btn-primary">Subjects</a>
            </div>
        </div>
    </div>
@endsection

@section('title')
    <h1 class="page-title"> Subjects
        <small>Recent Edit Subjects</small>
    </h1>
@endsection

@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Edit Subjects </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form method="POST" id="users_add" action="{{route('subject.update',$subject->id)}}" class="form-horizontal">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-1 control-label">Name</label>
                        <div class="col-md-9">
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{old('name')?old('name'):$subject->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Class</label>
                        <div class="col-md-9">
                            <select name="class" class="form-control">
                                <option value="">Please select class</option>
                                @foreach($classes as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            {{--<input type="text" name="class" class="form-control" placeholder="Enter Subject" value="{{old('class')?old('class'):$subject->class}}">--}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Origin</label>
                        <div class="col-md-9">
                            <input type="text" name="origin" class="form-control" placeholder="Enter Subject" value="{{old('origin')?old('origin'):$subject->origin}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Description</label>
                        <div class="col-md-9">
                            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{old('description')?old('description'):$subject->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Slug</label>
                        <div class="col-md-9">
                            <input type="text" name="slug" class="form-control" placeholder="Enter Slug" value="{{old('slug')?old('slug'):$subject->slug}}">
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
