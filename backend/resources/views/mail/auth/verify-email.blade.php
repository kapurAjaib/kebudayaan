<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Your Email</title>
</head>

<body>
    <h1>Verify Your Email</h1>
    <p>Here is the code to activate your email.</p>
    <h3>Code: {{ $data['code'] }}</h3>
    <p>If you did not create an account, no further action is required.</p>
    <p>Regards, {{ config('app.name') }}</p>
</body>

</html>
