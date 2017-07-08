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
            <a href="{{url('')}}/admin/users">Lectures</a>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="form-actions">
            <div class="btn-set pull-left">
                <a href="{{url('admin/lecture')}}" class="btn btn-primary">Lectures</a>
            </div>
        </div>
    </div>
@endsection

@section('title')
    <h1 class="page-title"> Lectures
        <small>Recent Add Lectures</small>
    </h1>
@endsection

@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Add Lectures </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form method="POST" id="users_add" action="{{route('lecture.store')}}" class="form-horizontal">
                {{csrf_field()}}
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-1 control-label">Name</label>
                        <div class="col-md-9">
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Subject</label>
                        <div class="col-md-9">
                            <select name="subject_id" class="form-control">
                                <option value="">Select a subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Chapter</label>
                        <div class="col-md-9">
                            <select name="chapter_id" class="form-control">
                                <option value="">Select a chapter</option>
                                @foreach($chapters as $chapter)
                                    <option value="{{$chapter->id}}">{{$chapter->name.' ('.$chapter->subject->name.' '.$chapter->subject->class.')'}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Description</label>
                        <div class="col-md-9">
                            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{old('class')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">Slug</label>
                        <div class="col-md-9">
                            <input type="text" name="slug" class="form-control" placeholder="Enter Slug" value="{{old('slug')}}">
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

    <script src="{{url('')}}/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/pages/scripts/ui-sweetalert.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
    <script>
        //    function subjectChange(subject_id) {
        //        alert(subject_id);
        {{--$.ajax({--}}
        {{--method: 'POST',--}}
        {{--url   : "{{url('admin/get-chapter')}}/"+subject_id,--}}
        {{--data  : {--}}
        {{--_token : "{{csrf_token()}}"--}}
        {{--},--}}
        {{--success: function(response){--}}
        {{--console.log(response)--}}
        {{--//                if(response == 'success'){--}}
        {{--//                    swal("Deleted!", "Entry Deleted.", "success");--}}
        {{--//                    location.reload();--}}
        {{--//                }else{--}}
        {{--//                    swal("Cancelled", "Please try again.", "error");--}}
        {{--//                }--}}
        {{--}--}}
        {{--});--}}
        //    }
        //    function populateState(countryId)
        //    {
        //        var state_arr = s_a[countryId].split("|");
        //
        //        var select = document.getElementById('state');
        //
        //        for(var s = select.options.length - 1 ; s >= 0 ; s--)
        //        {
        //            select.remove(s);
        //        }
        //        for (var i = 0; i<state_arr.length; i++){
        //            var opt = document.createElement('option');
        //            opt.value = state_arr[i];
        //            opt.innerHTML = state_arr[i];
        //            select.appendChild(opt);
        //        }
        //
        //    }

    </script>
@endsection


