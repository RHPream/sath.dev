@extends('layouts.userLayout')

@section('slider')
    <div class="subject_header">
        <h3 class="text-center">Wellcome To Model Text</h3>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="University_search">
                <h3 class="text-center">Some text here</h3>
                <form class="form-inline">
                    <div class="form-group for_university">
                        <label for="exampleInputName2">Subject</label><br/>
                        <select class="form-control" id="exampleInputName2">
                            <option>Physics</option>
                            <option>Math</option>
                            <option>Chemisty</option>
                            <option>Biology</option>

                        </select>
                    </div>
                    <div class="form-group for_university">
                        <label for="exampleInputEmail2">Lecture</label><br/>
                        <select class="form-control" id="exampleInputEmail2">
                            <option>Lecture 1</option>
                            <option>Lecture 2</option>
                            <option>Lecture 3</option>
                            <option>Lecture 4</option>
                            <option>Lecture 5</option>

                        </select>
                    </div>

                    <button type="submit" class="btn btn-default for_search">Start</button>
                </form>
            </div>


        </div>
        <div class="col-xs-6">
            <div class="University_search">
                <h3 class="text-center">Some text here</h3>
                <form class="form-inline">
                    <div class="form-group for_university">
                        <label for="exampleInputName2">Subject</label><br/>
                        <select class="form-control" id="exampleInputName2">
                            <option>Physics</option>
                            <option>Math</option>
                            <option>Chemisty</option>
                            <option>Biology</option>

                        </select>
                    </div>
                    <div class="form-group for_university">
                        <label for="exampleInputEmail2">Lecture</label><br/>
                        <select class="form-control" id="exampleInputEmail2">
                            <option>Lecture 1</option>
                            <option>Lecture 2</option>
                            <option>Lecture 3</option>
                            <option>Lecture 4</option>
                            <option>Lecture 5</option>

                        </select>
                    </div>

                    <button type="submit" class="btn btn-default for_search">Start</button>
                </form>
            </div>


        </div>
    </div>
@endsection