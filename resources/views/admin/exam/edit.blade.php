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
            <a href="{{url('')}}/admin/users">Exams</a>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="form-actions">
            <div class="btn-set pull-left">
                <a href="{{url('admin/exams')}}" class="btn btn-primary">Exams</a>
            </div>
        </div>
    </div>
@endsection

@section('title')
    <h1 class="page-title"> Exams
        <small>Recent Update Exams</small>
    </h1>
@endsection

@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Update Exams </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form method="post" id="users_add" action="{{route('exams.update',$exam->id)}}" class="form-horizontal">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-4">
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{old('name')!=null?old('name'):$exam->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Category</label>
                        <div class="col-md-4">
                            <select name="category" class="form-control">
                                @foreach($categories as $category)
                                    @if($category->id==$exam->category_id)
                                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Subject</label>
                        <div class="col-md-4">
                            <p class="help-text">Not required if category is final or year wise</p>
                            <select name="subject" class="form-control">
                                <option value="">Please Select Subject</option>
                                @foreach($subjects as $c)
                                    @if($c->id==$exam->subject)
                                        <option value="{{$c->id}}" selected>{{$c->name.' ( Class: '.$c->class_output($c->class)->name.' )'}}</option>
                                    @else
                                        <option value="{{$c->id}}">{{$c->name.' ( Class: '.$c->class_output($c->class)->name.' )'}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Year</label>
                        <div class="col-md-4">
                            <p class="help-text">Not required if category is not Year wise</p>
                            <select name="year" class="form-control">
                                <option value="">Please select year</option>
                                @foreach($years as $y)
                                    @if($c->id==$exam->year_id)
                                        <option value="{{$y->id}}" selected>{{$y->university.', Unit: '.$y->unit.', Year: '.$y->year}}</option>
                                    @else
                                        <option value="{{$y->id}}">{{$y->university.', Unit: '.$y->unit.', Year: '.$y->year}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Slug</label>
                        <div class="col-md-4">
                            <input type="text" name="slug" class="form-control" placeholder="Enter Slug" value="{{old('slug')!=null?old('slug'):$exam->slug}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Suggestion</label>
                        <div class="col-md-4">
                            <p class="help-block">"On" is for our suggestion</p>
                            <div class="icheck-inline">
                                <input type="checkbox" name="owns" class="make-switch" data-on-color="info" value="1" data-off-color="success"
                                       @if(old('owns') == '1'|| $exam->owns==1)
                                       checked
                                        @endif
                                >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Payable</label>
                        <div class="col-md-4">
                            <p class="help-block">"On" is for final exam</p>
                            <div class="icheck-inline">
                                <input type="checkbox" name="is_final" class="make-switch" data-on-color="info" value="1" data-off-color="success"
                                       @if(old('is_final') == '1'||$exam->is_final==1)
                                       checked
                                        @endif
                                >
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-actions fluid">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
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
