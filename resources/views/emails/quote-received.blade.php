<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Request Received</title>
</head>

<body>
    <h2>Quote Request Received</h2>

    <p>Dear User,</p>

    <p>We have received your quote request.
        @if ($newUser)
            Here are your client panel login details:
        @endif
    </p>

    @if ($newUser)
        <ul>
            <li><strong>Email:</strong> {{ $email }}</li>
            <li><strong>Password:</strong> {{ $newUserPassword }}</li>
        </ul>
    @endif

    <p>We will get back to you as soon as possible.</p>
    <p>Thank you!</p>
</body>

</html>
