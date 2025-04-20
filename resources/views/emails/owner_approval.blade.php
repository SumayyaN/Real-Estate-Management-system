<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account Has Been Approved</title>
</head>
<body>
    <h1>Hello, {{ $name }}!</h1>

    <p>Congratulations! Your request to become a property owner has been approved.</p>

    <p>Here are your login details:</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>

    <p>You can log in to your account at <a href="{{ url('/login') }}">here</a>.</p>

    <p>Best regards,</p>
    <p>The Admin Team</p>
</body>
</html>
