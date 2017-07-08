{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}
@extends('layouts.guestLayout')

@section('slider')
    <!--Form with header-->
    <div>
        <div>

            <!--Header-->
            <div class="form-header-blue-gradient">
                <h3><i class="fa fa-user-o auth-icon"></i> Register:</h3>
            </div>

            <!--Body-->
            <div class="md-form">
                <i class="fa fa-user prefix"></i>
                <input type="text" id="form3" class="form-control" placeholder="Name">
            </div>
            <div class="md-form">
                <i class="fa fa-envelope prefix"></i>
                <input type="text" id="form2" class="form-control" placeholder="Email">
            </div>
            <div class="md-form">
                <i class="fa fa-phone prefix"></i>
                <input type="text" id="form2" class="form-control" placeholder="Phone number">
            </div>

            <div class="md-form">
                <i class="fa fa-lock prefix"></i>
                <input type="password" id="form4" class="form-control" placeholder="Password">
            </div>
            <div class="md-form">
                <i class="fa fa-unlock prefix"></i>
                <input type="password" id="form5" class="form-control" placeholder="Confirmation Password">
            </div>

            <div class="text-center">
                <button class="btn btn-indigo">Sign up</button>
                <hr>
            </div>

        </div>
    </div>
    <!--/Form with header-->
@endsection