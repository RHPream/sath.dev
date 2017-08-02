<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Easy School</title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <link rel="stylesheet" href="{{url('')}}/css/styleLogin.css">


</head>

<body>
<div class="form">

    <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
    </ul>

    <div class="tab-content">
        <div id="signup">
            <h1>Sign Up for Free</h1>
            @if(session('status'))
                <h2 style="color: green">{{session('status')}}</h2>
            @endif

            <form method="POST" action="{{ route('register') }}">
                {{csrf_field()}}
                <div class="field-wrap">
                    <label>Name<span class="req">*</span></label>
                    <input type="text" name="name" required autocomplete="off" />
                </div>

                <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name="email" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Phone Number<span class="req">*</span>
                    </label>
                    <input type="text" name="phone" autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input type="password" name="password" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Confirm Password<span class="req">*</span>
                    </label>
                    <input type="password" name="password_confirmation" required autocomplete="off"/>
                </div>
                <input type="submit" class="button button-block" value="Register">

            </form>

        </div>
        <div id="login">
            <h1>Welcome Back!</h1>

            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="field-wrap">
                    @if ($errors->has('email'))
                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input type="password" name="password" required autocomplete="off"/>
                </div>

                <p class="forgot"><a href="{{ route('password.request') }}">Forgot Password?</a></p>

                <button class="button button-block"/>Log In</button>

            </form>

        </div>
    </div><!-- tab-content -->

</div> <!-- /form -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="{{url('')}}/js/indexLogin.js"></script>

</body>
</html>
