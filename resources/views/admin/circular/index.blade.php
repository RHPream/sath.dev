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
            <a href="{{url('')}}/admin">Circulars</a>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="form-actions">
            <div class="btn-set pull-left">
                <a href="{{url('admin/circular/create')}}" class="btn btn-primary">Add circular</a>
            </div>
        </div>
    </div>
@endsection

@section('title')
    <h1 class="page-title"> Circulars
        <small>Recent Circulars</small>
    </h1>
@endsection

@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Circulars </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="sample_2">
                <thead>
                <tr>
                    <th> # </th>
                    <th> University </th>
                    <th> Unit </th>
                    <th> Type </th>
                    <th> News </th>
                    <th> Description </th>
                    <th> File </th>
                    <th> Link </th>
                    <th> Actions </th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($circulars as $circular)
                    <tr>
                        <td>{{$i++}}</td>
                        <td> {{$circular->university->name}}</td>
                        <td> {{$circular->unit}}</td>
                        <td> {{$circular->type}}</td>
                        <td> {{$circular->marque}}</td>
                        <td> {!! $circular->description !!}</td>
                        <td> {{$circular->file}}</td>
                        <td><a href="{{$circular->link}}" target="_blank">{{$circular->link}}</a></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-left" role="menu">
                                    <li>
                                        <a href="{{url('admin/circular').'/'.$circular->id.'/edit'}}">
                                            <i class="glyphicon glyphicon-edit"></i> Edit </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="row-delete" id="{{$circular->id}}">
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

            swal({
                    title: "Do you want to delete this entry?",
                    text: "Are you sure?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: true,
                    showLoaderOnConfirm: false, },
                function(){
                    setTimeout(function(){
                        ajax_delete(id);
                    }, 10);
                });
        });

        function ajax_delete(id){
            $.ajax({
                method: 'DELETE',
                url   : "{{url('admin/circular')}}/"+id,
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
                }
            })
        }

    </script>

@endsection