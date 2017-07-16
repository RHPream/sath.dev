@extends('layouts.userLayout')

@section('slider')
    <div class="wrapper" style="margin-top: 50px;">
        <h1 class="text-center">{{$exam->name}}</h1>
        <h4 class="text-center">Subject: {{$exam->subject}}</h4>
        <?php $i=1; ?>
        <form action="{{route('submit-ans')}}" method="post">
            {{csrf_field()}}
        @foreach($questions as $quesion)
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p class="quiz-title">{{$i}}. {{ $quesion->question }}</p>
                                </div>
                                @foreach($quesion->option($quesion->id) as $option)
                                    <div class="col-xs-10 col-cs-offset-2">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="ans{{$i}}" value="{{$option->option}}">
                                                {{$option->option}}
                                            </label>
                                            <input type="hidden" name="ques{{$i}}" value="{{$quesion->id}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            <?php $i++; ?>
        @endforeach
            <div class="row">
                <div class="col-xs-5 col-xs-offset-4">
                    <div class="form-group"><input type="submit" class="btn btn-success"></div>
                </div>
            </div>
            
        </form>
    </div>
@endsection