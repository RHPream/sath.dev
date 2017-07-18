@extends('users.layout.master')

@section('header_scripts')
    <script src="{{url('tinymce')}}/tinymce.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" />
    <link href="{{url('')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('/home')}}">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
@endsection

@section('title')
    <h1 class="page-title"> Dashboard
        <small>Recent Dashboard</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="col-sm-2 col-sm-offset-5" style="margin-top: 20px;">
                    <div class="my-pic">
                        <img src="/images/ceo-avatar.png" alt="" class="img-circle img-responsive">
                        <form action="#">
                            <div class="form-group">
                                <label for="profile-pic" class="btn btn-primary" style="margin-left: 35%;text-align: center;margin-top: 10px;">Update</label>
                                <input type="file" name="profile_pic" id="profile-pic" style="display: none">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <div class="col-md-6">
                    <h1 class="text-center">Your profile</h1>
                    <form method="POST" id="users_add" action="{{route('user-update')}}" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Enter Subject" value="{{Auth::user()->email}}" disabled="disabled">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Phone Number</label>
                                <div class="col-md-9">
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Slug" value="{{Auth::user()->phone}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Class</label>
                                <div class="col-md-9">
                                    <select name="class_id" class="form-control">
                                        <?php
                                            if(Auth::user()->userProfile->class_id!=0)
                                            {
                                                $c = Auth::user()->userProfile->userclass(Auth::user()->userProfile->class_id)->name;
                                            }
                                            else{
                                                $c = 'Please Select your class';
                                            }

                                        ?>
                                        <option value="{{$c}}">{{$c}}</option>
                                        @foreach($classes as $c)
                                                <option value="{{$c->name}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Balance</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Balance" value="{{Auth::user()->userProfile->balance}} TK" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Last Payment</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Balance" value="{{Auth::user()->userProfile->last_payment_amount.' TK ( Date: '.date('d M, y',strtotime(Auth::user()->userProfile->last_payment_date)).' )'}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h1 class="text-center">Payment</h1>
                    <form method="POST" id="users_add" action="{{route('pay-user')}}" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Send from</label>
                                <div class="col-md-9">
                                    <input type="text" name="send_from" class="form-control" placeholder="Enter sender mobile number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Method</label>
                                <div class="col-md-9">
                                    <select name="method_type" class="form-control">
                                        <option value="bKash">bKash</option>
                                        <option value="DBBL">DBBL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reference</label>
                                <div class="col-md-9">
                                    <input type="text" name="reference" class="form-control" placeholder="Enter reference">
                                </div>
                            </div>
                            <div class="form-group payment-last-input">
                                <label class="col-md-3 control-label">Amount</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="amount" placeholder="Amount">
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
                </div>
                <div class="col-xs-10 col-xs-offset-1">
                    <h1 class="text-center">All exam result by You</h1>
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Exam </th>
                            <th> Subject </th>
                            <th> Category </th>
                            <th> Marks </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($exams as $exam)
                            <tr>
                                <td>{{$i++}}</td>
                                <td> {{$exam->exam->name}}</td>
                                <td> {{$exam->exam->subject}}</td>
                                <td> {{$exam->category($exam->exam->category_id)}} wise</td>
                                <td> {{$exam->marks}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>

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