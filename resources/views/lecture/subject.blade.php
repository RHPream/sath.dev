@extends('layouts.userLayout')

@section('slider')
    <section>
        <div class="container-fluid">


                <div class="subject_header">
                    <h3 class="text-center">Tomader jonno "{{$lectures[0]->subject->name}}" er alochona somoho</h3>
                </div>

            {{--<div class="col-xs-offset-1 col-xs-3 pull-right">--}}
                {{--<div class="for_image text-center">--}}
                    {{--<img class="img-responsive" src="img/math-and-symbols-image3.jpg" alt="">--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>

        <div class="container-fluid">
            <div class="Subject_table">
                <table class="table table-bordered tbl">
                    <tr>
                        <th>Chapter</th>
                        <th>Lecture Seet</th>
                        <th>Video Lecture</th>
                        <th>Lecture vittik Exam</th>
                    </tr>
                    @foreach($lectures as $l)
                        <tr>
                            <td>{{ $l->chapter->name }}</td>
                            <td>
                                {{ $l->name }}
                            </td>
                            <td>
                                {{$l->tut_link}}
                            </td>
                            <td>
                                <a href="{{url('').'/exam/'.$l->slug}}">{{ $l->exam($l->slug)->name }}</a>
                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>

        </div>

    </section>
@endsection