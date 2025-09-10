<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conyact Us Form Query</title>
    <style>
        ul {
            list-style: none;
            padding: 0;
        }
    
        li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h2>Conyact Us Form Query</h2>

    <ul>
        <li><strong>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> {{ $data['name'] }}</li>
        <li><strong>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> {{ $data['email'] }}</li>
        <li><strong>Phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> {{ $data['phone'] }}</li>
        <li><strong>Subject:&nbsp;&nbsp;</strong> {{ $data['subject'] }}</li>
        <li><strong>Message:</strong> {{ $data['message'] }}</li>
    </ul>
    
    <br>

</body>

</html>