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
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ceo-image">
                            <img src="{{url('')}}/images/ceo-avatar.png" alt="" class="img-circle img-thumbnail text-center">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="about-ceo">
                            <h2 class="text-center">About CEO</h2>
                            <ul>
                                <li>A great personality to take decission</li>
                                <li>A great personality to take decission</li>
                                <li>A great personality to take decission</li>
                                <li>A great personality to take decission</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="intro-video">
                            <iframe width="100%" height="200" src="https://www.youtube.com/embed/aBqU0LDd3WY" frameborder="0" allowfullscreen></iframe>

                        </div>
                        <div class="video-overview">
                            <span class="video-description">Description of the video</span>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="message-from-ceo">
                            <h2 class="text-center">Message From CEO</h2>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Message 1
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Message 2
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Message 3
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection