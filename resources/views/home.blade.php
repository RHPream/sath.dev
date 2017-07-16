@extends('layouts.userLayout')

@section('slider')
    <div class="subject_header">
        <h3 class="text-center">Some text goes here</h3>
    </div>
    <div class="subject_name">
        @foreach($subjects as $subject)
        <div class=" col-xs-5 subject_button text-center">
            <a class="btn btn-default" href="{{url('').'/subject/'.$subject->id}}" role="button">{{$subject->name}}</a>
        </div>
        <div class=" col-xs-5 subject_button text-center">
            <a class="btn btn-default" href="{{url('').'/subject/'.$subject->id}}" role="button">{{$subject->name}}</a>
        </div>
        <div class=" col-xs-5 subject_button text-center">
            <a class="btn btn-default" href="{{url('').'/subject/'.$subject->id}}" role="button">{{$subject->name}}</a>
        </div>
        <div class=" col-xs-5 subject_button text-center">
            <a class="btn btn-default" href="{{url('').'/subject/'.$subject->id}}" role="button">{{$subject->name}}</a>
        </div>
        @endforeach
    </div>
@endsection