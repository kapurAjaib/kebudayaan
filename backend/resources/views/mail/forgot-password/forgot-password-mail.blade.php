<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
</head>
<body>
    <h1>Forgot Password</h1>
    <p>Click the link below to reset your password.</p>
    <a href="{{ $url }}">Reset Password</a>
    <p>If you did not request a password reset, no further action is required.</p>
    <p>Regards,<br>{{ config('app.name') }}</p>
</body>
</html>