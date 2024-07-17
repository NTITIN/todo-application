<!DOCTYPE html>
<html>
<head>
    <title>Invitation</title>
</head>
<body>
    <h1>You're Invited!</h1>
    <p>Click the link below to register:</p>
    <a href="{{ url('invitations/accept', $token) }}">Register Here</a>
</body>
</html>
