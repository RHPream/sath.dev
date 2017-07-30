<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account Confirmation</title>
</head>
<body>
    <h1>Thank you for sign up with us</h1>
    <h2>Please confirm your email to sign in</h2>
    <p><a href="{{url('register/confirm').'/'.$user->verification_token}}">Confirm</a></p>
</body>
</html>