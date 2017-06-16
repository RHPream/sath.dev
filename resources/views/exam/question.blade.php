<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0"/>
    <meta name="HandheldFriendly" content="true"/>

    <title>Find out if you are eligible to donate blood | Australian Red Cross Blood Service</title>

    <link rel="stylesheet" href="{{url('css')}}/quiz.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{url('js')}}/quiz.js"></script>
</head>
<body>


<div class="region region-content">
    <div id="block-system-main" class="block block-system">

        <div class="content">

            <div class="page">

                <div class="ui overlayContainer">
                    <section class="section">
                        <div class="ui wrapper">
                            <header class="header">
                                <h1 class="heading text-center" style="text-align: center;font-size: 30px;">Take quiz</h1>
                            </header>
                            <div class="content">
                                <div class="block-inner">
                                    <div class="content">
                                        <div class="quiz" id="quiz">
                                            <form action="{{route('submit-ans')}}" method="post">
                                                {{csrf_field()}}
                                                <ul>
                                                    <li class="active">
                                                        <p class="quiz-title">Loading...</p>
                                                    </li>

                                                    <li id="qz-0">
                                                        <div class="quiz-image"><img
                                                                    src="http://www.donateblood.com.au/sites/default/files/quiz/quiz-intro.png"
                                                                    alt=""/></div>
                                                        <div class="quiz-question">
                                                            <p class="quiz-title"><span>Are you ready<br/>to take quiz?</span>
                                                            </p>
                                                            <p>Answer MCQ questions to<br/>find out if you’re
                                                                eligible. <strong>remember you can't go back. If you then you are done.</strong>
                                                            </p>
                                                            <div class="quiz-buttons"><a href="#" class="start alt-button">Take
                                                                    the quiz</a></div>
                                                        </div>
                                                    </li>
                                                    <?php $i=1; ?>
                                                    @foreach($questions as $quesion)
                                                        <li data-qc="0">
                                                            <div class="quiz-question">
                                                                <p class="quiz-title">{{ $quesion->question }}</p>

                                                                @foreach($quesion->option($quesion->id) as $option)
                                                                    <input type="radio" name="ans{{$i}}" value="{{$option->option}}"> {{$option->option}}<br>
                                                                    <input type="hidden" name="ques{{$i}}" value="{{$quesion->id}}">
                                                                @endforeach

                                                                <div class="quiz-buttons">
                                                                    <a class="no alt-button" href="#">Next</a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php $i++; ?>
                                                    @endforeach

                                                    <li id="qz- 1">
                                                        <input type="submit" value="Submit" class="btn btn-success">
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>