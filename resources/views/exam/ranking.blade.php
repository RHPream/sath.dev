@extends('layouts.userLayout')

@section('slider')
    <div class="wrapper" style="margin-top: 50px;">
        <h1 class="text-center">Exam Ranking</h1>
        <table class="table">
            <tr>
                <th>Ranking</th>
                <th>Name</th>
                <th>Mark</th>
            </tr>
            <?php $i = 1; ?>
            @foreach($rankings as $ranking)
                <tr @if(isset($current))
                        @if($current==$ranking->id)
                            style="background-color: rgba(0,0,0,.4);"
                        @endif
                    @endif>
                    <td>{{$i++}}</td>
                    <td>
                        @if($ranking->user_id==0)
                            Guest
                        @else
                            {{$ranking->user->name}}
                        @endif
                    </td>
                    <td> {{$ranking->marks}}</td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection