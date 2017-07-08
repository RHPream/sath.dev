{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Dashboard</div>--}}

                {{--<div class="panel-body">--}}
                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
@extends('layouts.userLayout')

@section('slider')
    <div class="subject_header">
        <h3 class="text-center">Some text goes here</h3>
    </div>
    <div class="subject_name">
        <div class=" col-xs-5 subject_button text-center">
            <a class="btn btn-default" href="#" role="button">Math</a>
        </div>
        <div class="col-xs-5 subject_button text-center">
            <a class="btn btn-default" href="#" role="button">Physics</a>
        </div>
        <div class="col-xs-5 subject_button text-center">
            <a class="btn btn-default" href="#" role="button">Chemisty</a>
        </div>
        <div class="col-xs-5 subject_button text-center">
            <a class="btn btn-default" href="#" role="button">Biology</a>
        </div>
    </div>
@endsection