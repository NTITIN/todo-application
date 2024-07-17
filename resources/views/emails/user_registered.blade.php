<!-- resources/views/emails/user_registered.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Application</title>
</head>
<body>
    <h1>Hello, {{ $name }}!</h1>
    <p>Thank you for registering with us. Please click the link below to complete your registration:</p>
    <a href="{{ $url }}">Complete Registration</a>
</body>
</html>
