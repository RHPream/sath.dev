@extends('layouts.userLayout')

@section('slider')
    <div class="subject_header">
        <h3 class="text-center">University Question</h3>
    </div>
    <div class="University_search">
        <form class="form-inline">
            <div class="form-group for_university">
                <label for="exampleInputName2">University</label><br/>
                <select class="form-control" id="exampleInputName2">
                    <option>Dhaka</option>
                    <option>Jahangir nagar</option>
                    <option>Jaganth</option>
                    <option>Dhaka</option>
                    <option>Dhaka</option>
                </select>
            </div>
            <div class="form-group for_university">
                <label for="exampleInputEmail2">Year</label><br/>
                <select class="form-control" id="exampleInputEmail2">
                    <option>2000</option>
                    <option>2001</option>
                    <option>2002</option>
                    <option>2003</option>
                    <option>2004</option>
                    <option>2004</option>
                    <option>2004</option>
                    <option>2004</option>
                    <option>2004</option>
                    <option>2004</option>
                    <option>2004</option>
                    <option>2004</option>
                    <option>2004</option>
                    <option>2004</option>
                    <option>2004</option>
                </select>
            </div>
            <div class="form-group for_university">
                <label for="exampleInputButton">Unit</label><br/>
                <select class="form-control" id="exampleInputButton">
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                    <option>E</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default for_search">Search</button>
        </form>
    </div>
@endsection