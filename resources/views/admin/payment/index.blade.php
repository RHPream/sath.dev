@extends('admin.layout.master')

@section('header_scripts')

    <link href="{{url('')}}/assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <ul class="page-breadcrumb">
        <li>
            <a href="#">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{url('')}}/admin/users">Payments</a>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="form-actions">
            <div class="btn-set pull-left">
                <a class="btn btn-danger" data-target="#stack1" data-toggle="modal">Add Payment</a>
            </div>
        </div>
    </div>
@endsection

@section('title')
    <h1 class="page-title"> Payments
        <small>Recent Payments</small>
    </h1>
@endsection

@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Payments </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="sample_2">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Sender </th>
                    <th> Sending from </th>
                    <th> Reference </th>
                    <th> Method </th>
                    <th> Amount </th>
                    <th> Status </th>
                    <th> Actions </th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{$i++}}</td>
                        <td> {{$payment->user->name}}</td>
                        <td> {{$payment->send_from}}</td>
                        <td> {{$payment->reference}}</td>
                        <td> {{$payment->method}}</td>
                        <td> {{$payment->amount}} TK</td>
                        <td> {{$payment->status?'Approved':'None' }}</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-left" role="menu">
                                    {{--<li>--}}
                                        {{--<a href="{{url('admin/payment').'/'.$payment->id.'/approve'}}">--}}
                                            {{--<i class="glyphicon glyphicon-ok"></i> Approve </a>--}}
                                    {{--</li>--}}
                                    <li>
                                        <a href="javascript:;" class="row-approve" id="{{$payment->id}}">
                                            <i class="glyphicon glyphicon-ok"></i> Approve </a>
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

    <div id="stack1" class="modal fade" tabindex="-1" data-focus-on="input:first">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add Payment</h4>
        </div>
        <form method="POST" id="change_password" action="{{route('live-pay')}}">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">User email</label>
                    <div class="col-md-9">
                        <input type="email" name="email" class="form-control" placeholder="Enter user email">
                    </div>
                </div>
                <div class="form-group" style="margin-top: 10px;">
                    <label class="col-md-3 control-label">Amount</label>
                    <div class="col-md-9">
                        <input type="text" name="amount" class="form-control" placeholder="Enter user amount">
                    </div>
                </div>
            </div>

            <div class="clearfix">

            </div>

            <div class="modal-footer">
                <button class="btn blue" type="submit">Submit</button>
                <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
            </div>
        </form>

    </div>

@endsection

@section('footer_scripts')
    <script src="{{url('')}}/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/pages/scripts/ui-sweetalert.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/pages/scripts/ui-extended-modals.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var window = location;
        $('.row-approve').click(function () {
            var id = $(this).attr('id');

            swal({
                    title: "Do you want to approve this transaction?",
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
                method: 'post',
                url   : "{{url('admin/approve-payment')}}/"+id,
                data  : {
                    _token : "{{csrf_token()}}"
                },
                success: function(response){
                    // console.log(response)
                    if(response){
                        swal("Approved!", "Entry approved.", "success");
                    }else{
                        swal("Cancelled", "Please try again.", "error");
                    }
                },
                error: function () {
                    swal("Approved!", "Entry approved.", "success");
                    location.reload();
                }
            })
        }

    </script>

@endsection
