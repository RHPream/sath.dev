@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{url('')}}/css/custom.css">
    <link href='https://fonts.googleapis.com/css?family=Just+Another+Hand' rel='stylesheet' type='text/css'>
@endsection

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="logo">
                            <img src="{{url('')}}/images/Logo 3.jpg" class="logo-image" alt="Logo">
                        </div>
                        <div class="slider relative">
                            @yield('slider')
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="circular">
                            <h2 class="circular-header"><i class="fa fa-ravelry" style="margin-right: 10px;" aria-hidden="true"></i>Admission Circular</h2>
                            <p class="circular-ad">Dhaka University <a href="http://www.google.com" class="c-link"><i class="fa fa-space-shuttle" style="float:right;margin-right:15px;" aria-hidden="true"></i></a></p>
                            <p class="circular-ad">Rajsahi University <a href="" class="c-link"><i class="fa fa-space-shuttle" style="float:right;margin-right:15px;" aria-hidden="true"></i></a></p>
                            <p class="circular-ad">Chittagong University <a href="" class="c-link"><i class="fa fa-space-shuttle" style="float:right;margin-right:15px;" aria-hidden="true"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="border: 1px solid #000043;">
                @include('partials._sideBar')
            </div>
        </div>
    </div>
@endsection