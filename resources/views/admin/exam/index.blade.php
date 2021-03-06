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
                <a href="{{url('admin/exams/create')}}" class="btn btn-primary">Add Exam</a>
            </div>
        </div>
    </div>
@endsection

@section('title')
    <h1 class="page-title"> Exams
        <small>Recent Exams</small>
    </h1>
@endsection

@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Exams </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="sample_2">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Name </th>
                    <th> Subject </th>
                    <th> Category </th>
                    <th> Slug </th>
                    <th> Class </th>
                    <th> Final </th>
                    <th> Year </th>
                    <th> Suggestion </th>
                    <th> Actions </th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                    @foreach($exams as $exam)
                        <tr>
                            <td>{{$i++}}</td>
                            <td> {{$exam->name}}</td>
                            <td> {{$exam->subject?$exam->subjects($exam->subject)->name:'None Given'}}</td>
                            <td> {{$exam->category($exam->category_id)->name}}</td>
                            <td> {{$exam->slug}}</td>
                            <td> {{ $exam->class_id?$exam->UserClass($exam->class_id)->name:'None Given' }}</td>
                            <td> {{$exam->is_final?'Yes':'No'}}</td>
                            <td>
                                {!! $exam->year_id?'Year: '.$exam->year->year.'<br> '.$exam->year->university.'<br>Unit: '.$exam->year->unit:'No'!!}
                            </td>
                            <td> {{$exam->owns?'Our':'UV ques..'}}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">
                                        <li>
                                            <a href="{{url('admin/exams').'/'.$exam->id.'/edit'}}">
                                                <i class="glyphicon glyphicon-edit"></i> Edit </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('admin/set-question').'/'.$exam->id }}">
                                                <i class="glyphicon glyphicon-edit"></i> Set question </a>
                                        </li>

                                        <li>
                                            <a href="javascript:;" class="row-delete" id="{{$exam->id}}">
                                                <i class="glyphicon glyphicon-remove"></i> Delete </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
@endsection

@section('footer_scripts')
    <script src="{{url('')}}/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/pages/scripts/ui-sweetalert.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>

    <script type="text/javascript">

        $('.row-delete').click(function () {
            var id = $(this).attr('id');
            var a = "{{url('admin/exams')}}/"+id;
            console.log(a)

            swal({
                    title: "Do you want to delete this entry?",
                    text: "Are you sure?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: true,
                    showLoaderOnConfirm: true, },
                function(){
                    setTimeout(function(){
                        ajax_delete(id);
                    }, 500);
                });
        });

        function ajax_delete(id){
            $.ajax({
                method: 'DELETE',
                url   : "{{url('admin/exams')}}/"+id,
                data  : {
                    _token : "{{csrf_token()}}"
                },
                success: function(response){
                    // console.log(response)
                    if(response == 'success'){
                        swal("Deleted!", "Entry Deleted.", "success");
                        location.reload();
                    }else{
                        swal("Cancelled", "Please try again.", "error");
                    }
                },
                error: function () {
                    location.reload();
                }
            })
        }

    </script>

@endsection
