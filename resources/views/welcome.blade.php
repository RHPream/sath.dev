<!DOCTYPE HTML>
<html>
<head>
    <title>Easy School</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="{{url('')}}/css/main.css"/>
    <style>
        .mb-0>a
        {
            height: 40px;
            display: flex;
            background-color: rgba(44, 154, 213, 0.6);
            padding: 10px;
            font-size: 17px;
            font-weight: bold;
            color: #ffffff!important;
        }
        .card{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- Header -->
<header id="header" class="alt">
    <div class="logo"><a href="{{url('/')}}">Easy <span>School</span></a></div>
    <a href="#menu">Menu</a>
</header>

<!-- Nav -->
<nav id="menu">
    <ul class="links">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('/')}}">Consultation</a></li>
        <li><a href="{{url('/')}}">Steps to Prepear</a></li>
        <li><a href="{{url('/')}}">Textbook</a></li>
        <li><a href="{{url('register')}}">Register</a></li>
        <li><a href="{{url('login')}}">Login</a></li>
        <!--<li><a href="generic.html">Register</a></li>-->
        <!--<li><a href="elements.html">Login</a></li>-->
    </ul>
</nav>

<!-- Banner -->
<section class="banner full">
    <article>
        <img src="images/slide02.jpg" alt=""/>
        <div class="inner">
            <header>
                <p>A Best Medium To Reach Your Destination</p>
                <h3>Message From CEO</h3>
                <strong>Advice that can help you</strong>
            </header>
        </div>
    </article>
    <article>
        <img src="images/slide01.jpg" alt="" />
        <div class="inner">
            <header>
                <p>A Best Medium To Reach Your Destination</p>
                <h3>Message From CEO</h3>
                <strong>Advice that can help you</strong>
            </header>
        </div>
    </article>
</section>

<!-- One -->
<section id="one" class="wrapper style2">
    <div class="inner">
        <div class="grid-style">

            <div>
                <div class="box">
                    <div class="image fit home-video">
                        <!--<img src="images/pic02.jpg" alt="" />-->
                        <iframe width="100%" height="310" src="https://www.youtube.com/embed/5AnyFRpwCK0"
                                frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="content">
                        <header class="align-center">
                            <p>Your Career Our Responsibility</p>
                            <h2>Easy School</h2>
                        </header>
                    </div>
                </div>
            </div>

            <div>
                <div class="box">
                    <div class="image fit">
                        <img src="images/slide01.jpg" alt="" style="height: 310px;"/>
                    </div>
                    <div class="content">
                        <header class="align-center">
                            <p>Our honorable CEO</p>
                            <img src="images/pic01.jpg" style="height: 100px;width: 100px;border-radius: 50px;margin: 10px auto;" alt="">
                            <h2>Md. Reazul Islam(Reaz)</h2>
                            <span style="margin-top: -10px;">Designation</span>
                        </header>
                        <p>Description of CEO</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            <p>Your best online tutor for admission test</p>
            <h2>Easy School</h2>
        </header>
    </div>
</section>
<!-- Three -->
<section id="three" class="wrapper style2">
    <div class="inner">
        <header class="align-center">
            <p class="special">Get in touch with all university</p>
            <h2>University Admission Circular</h2>
        </header>

        <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Science Related Circular
                        </a>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card-block">
                        @if(count($sciences)<1)
                            <h1 class="text-center">Not published yet</h1>
                        @endif
                        <ul class="links">
                            @foreach($sciences as $s)
                                <li>{{$s->marque}}</li>
                                <ul class="links">
                                    <li><a href="{{$s->link}}">{{$s->link}}</a></li>
                                    <li><p>{{$s->description}}</p></li>
                                </ul>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingTwo">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Arts Related Circular
                        </a>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="card-block">
                        @if(count($arts)<1)
                            <h1 class="text-center">Not published yet</h1>
                        @endif
                        <ul class="links">
                            @foreach($arts as $s)
                                <li>{{$s->marque}}</li>
                                <ul class="links">
                                    <li><a href="{{$s->link}}">{{$s->link}}</a></li>
                                    <li><p>{{$s->description}}</p></li>
                                </ul>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingThree">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Commerce Related Circular
                        </a>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="card-block">
                        @if(count($commerces)<1)
                            <h1 class="text-center">Not published yet</h1>
                        @endif
                        <ul class="links">
                            @foreach($commerces as $s)
                                <li>{{$s->marque}}</li>
                                <ul class="links">
                                    <li><a href="{{$s->link}}">{{$s->link}}</a></li>
                                    <li><p>{{$s->description}}</p></li>
                                </ul>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingFour">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Common Circular
                        </a>
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                    <div class="card-block">
                        @if(count($commons)<1)
                            <h1 class="text-center">Not published yet</h1>
                        @endif
                        <ul class="links">
                            @foreach($commons as $s)
                                <li>{{$s->marque}}</li>
                                <ul class="links">
                                    <li><a href="{{$s->link}}">{{$s->link}}</a></li>
                                    <li><p>{{$s->description}}</p></li>
                                </ul>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Four-->
<section id="four" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            <p>Contact with us</p>
            <h2>Easy School</h2>
        </header>
    </div>
</section>
<section id="five" class="wrapper style2">
    <div class="inner">
        <form method="post" action="#">
            <div class="row uniform">
                <div class="6u 12u$(xsmall)">
                    <input type="text" name="name" id="name" value="" placeholder="Name" />
                </div>
                <div class="6u$ 12u$(xsmall)">
                    <input type="email" name="email" id="email" value="" placeholder="Email" />
                </div>
                <!-- Break -->
                <div class="12u$">
                    <textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
                </div>
                <!-- Break -->
                <div class="12u$">
                    <ul class="actions">
                        <li><input type="submit" value="Send Message" /></li>
                        <li><input type="reset" value="Reset" class="alt" /></li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Footer -->
<footer id="footer">
    <div class="container">
        <ul class="icons">
            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
        </ul>
    </div>
    <div class="copyright">
        &copy; EasySchool 2017. All rights reserved.
    </div>
</footer>
<!-- Scripts -->
<script src="{{url('')}}/js/jquery.min.js"></script>
<script src="{{url('')}}/js/jquery.scrollex.min.js"></script>
<script src="{{url('')}}/js/skel.min.js"></script>
<script src="{{url('')}}/js/util.js"></script>
<script src="{{url('')}}/js/main.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.home-video iframe').attr('width','100%');
        $('.home-video iframe').attr('height','310');
        $('.home-video iframe').attr('autoplay','1');
    });
</script>
</body>
</html>






{{--@extends('layouts.guestLayout')--}}

{{--@section('slider')--}}
    {{--<div class="home-video">--}}
        {{--{!!  $video->video  !!}--}}
    {{--</div>--}}

    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--$('.home-video iframe').attr('width','100%');--}}
            {{--$('.home-video iframe').attr('height','360');--}}
            {{--$('.home-video iframe').attr('autoplay','1');--}}
        {{--});--}}
    {{--</script>--}}
{{--@endsection--}}
