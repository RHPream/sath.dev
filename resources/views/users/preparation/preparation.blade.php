@extends('users.layout.master')

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
            <a href="{{url('')}}/admin/users">Preparations</a>
        </li>
    </ul>
@endsection

@section('title')
    <h1 class="page-title"> Preparations
        <small>Recent Preparations</small>
    </h1>
@endsection

@section('content')
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Preparations </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="sample_2">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Chapter </th>
                    <th> Content </th>
                    <th> Video Tutorial </th>
                    <th> Exam </th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                    @foreach($cps as $c)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$c['chapter']}}</td>
                            <td>{!!   $c['content'] !!}</td>
                            <td>{!!   $c['tut'] !!}</td>
                            <td><p>Exam</p></td>
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
@endsection
